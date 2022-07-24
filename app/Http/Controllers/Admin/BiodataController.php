<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BiodataAkademikExport;
use App\Exports\BiodataAmiExport;
use App\Exports\BiodataExport;
use App\Exports\BiodataKontrakYayasanExport;
use App\Exports\BiodataProfesiExport;
use App\Exports\BiodataTetapExport;
use App\Exports\BiodataTidakTetapExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBiodatumRequest;
use App\Http\Requests\StoreBiodatumRequest;
use App\Http\Requests\UpdateBiodatumRequest;
use App\Models\Biodatum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class BiodataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('biodatum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::with(['nik'])->get();

        return view('admin.biodata.index', compact('biodata'));
    }

    public function create()
    {
        abort_if(Gate::denies('biodatum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = User::pluck('name', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.biodata.create', compact('niks'));
    }

    public function store(StoreBiodatumRequest $request)
    {
        $attr = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageUrl = $image->store("file/image");
        } else {
            $imageUrl = NULL;
        }
        if ($request->file('nidn_file')) {
            $nidn = $request->file('nidn_file');
            $nidnUrl = $nidn->store("file/nidn");
        } else {
            $nidnUrl = NULL;
        }
        if ($request->file('filektp')) {
            $ktp = $request->file('filektp');
            $ktpUrl = $ktp->store("file/ktp");
        } else {
            $ktpUrl = NULL;
        }
        if ($request->file('sk_yayasandoc')) {
            $sk_yayasandoc = $request->file('sk_yayasandoc');
            $sk_yayasandocUrl = $sk_yayasandoc->store("file/sk_yayasandoc");
        } else {
            $sk_yayasandocUrl = NULL;
        }

        $attr['image'] = $imageUrl;
        $attr['nidn_file'] = $nidnUrl;
        $attr['filektp'] = $ktpUrl;
        $attr['sk_yayasandoc'] = $sk_yayasandocUrl;
        $biodatum = Biodatum::create($attr);

        return redirect()->route('admin.biodata.index');
    }

    public function edit(Biodatum $biodatum)
    {
        abort_if(Gate::denies('biodatum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = User::pluck('name', 'id')->prepend(trans('Silahkan Pilih'), '');

        $biodatum->load('nik');

        return view('admin.biodata.edit', compact('biodatum', 'niks'));
    }

    public function update(UpdateBiodatumRequest $request, Biodatum $biodatum)
    {
        $attr = $request->all();
        if ($biodatum->image != NULL) {
            if (request()->file('image')) {
                Storage::delete($biodatum->image);
                $image = request()->file('image')->store('file/image');
            } else {
                $image = $biodatum->image;
            }
        } else {
            if ($biodatum->image = NULL) {
                $image = request()->file('image')->store('file/image');
            }
            else {
                $image = null;
            }
        }
        if ($biodatum->nidn_file != NULL) {
            if (request()->file('nidn_file')) {
                Storage::delete($biodatum->nidn_file);
                $nidn = request()->file('nidn_file')->store('file/nidn');
            } else {
                $nidn = $biodatum->nidn_file;
            }
        } else {
            if ($biodatum->nidn_file = NULL) {
                $nidn = request()->file('nidn_file')->store('file/nidn');
            }
            else {
                $nidn = null;
            }
        }
        if ($biodatum->filektp != NULL) {
            if (request()->file('filektp')) {
                Storage::delete($biodatum->filektp);
                $ktp = request()->file('filektp')->store('file/ktp');
            } else {
                $ktp = $biodatum->filektp;
            }
        } else {
            if ($biodatum->filektp = NULL) {
                $ktp = request()->file('filektp')->store('file/ktp');
            }
            else {
                $ktp = null;
            }
        }

        if ($biodatum->sk_yayasandoc != NULL) {
            if (request()->file('sk_yayasandoc')) {
                Storage::delete($biodatum->sk_yayasandoc);
                $sk_yayasandoc = request()->file('sk_yayasandoc')->store('file/sk_yayasandoc');
            } else {
                $sk_yayasandoc = $biodatum->sk_yayasandoc;
            }
        } else {
            if ($biodatum->sk_yayasandoc = NULL) {
                $sk_yayasandoc = request()->file('sk_yayasandoc')->store('file/sk_yayasandoc');
            }
            else {
                $sk_yayasandoc = null;
            }
        }

        $attr['image'] = $image;
        $attr['nidn_file'] = $nidn;
        $attr['filektp'] = $ktp;
        $attr['sk_yayasandoc'] = $sk_yayasandoc;

        $biodatum->update($attr);

        return redirect()->route('admin.biodata.index');
    }

    public function show(Biodatum $biodatum)
    {
        abort_if(Gate::denies('biodatum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatum->load('nik', 'biodataImpasings', 'biodataJafungs', 'biodataKepangkatans', 'biodataPendidikans', 'biodataDiklats', 'biodataSertifikasis', 'biodataSertifikasiprofs', 'biodataStudis', 'biodataRekognisis');

        return view('admin.biodata.show', compact('biodatum'));
    }

    public function destroy(Biodatum $biodatum)
    {
        abort_if(Gate::denies('biodatum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Storage::delete($biodatum->image);
        Storage::delete($biodatum->nidn_file);
        Storage::delete($biodatum->filektp);
        Storage::delete($biodatum->sk_yayasandoc);
        $biodatum->delete();

        return back();
    }

    public function export()
    {
        return Excel::download(new BiodataExport, 'Export Biodata Dosen.xlsx');
    }
    public function exportDosenAkademik()
    {
        return Excel::download(new BiodataAkademikExport, 'Export Biodata Dosen Akademik.xlsx');
    }
    public function exportDosenProfesi()
    {
        return Excel::download(new BiodataProfesiExport, 'Export Biodata Dosen Profesi.xlsx');
    }
    public function exportDosenTetap()
    {
        return Excel::download(new BiodataTetapExport, 'Export Biodata Dosen Tetap Yayasan.xlsx');
    } 
    public function exportDosenTidakTetap()
    {
        return Excel::download(new BiodataTidakTetapExport, 'Export Biodata Dosen Tidak Tetap.xlsx');
    } 
    public function exportDosenKontrakYayasan()
    {
        return Excel::download(new BiodataKontrakYayasanExport, 'Export Biodata Dosen Kontak Yayasan.xlsx');
    } 
    public function exportBiodataAmi()
    {
        return Excel::download(new BiodataAmiExport, 'Export Biodata Dosen Borang AMI.xlsx');
    } 
}
