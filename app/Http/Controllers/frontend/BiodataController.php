<?php

namespace App\Http\Controllers\Frontend;

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

        $biodata = Biodatum::with(['nik'])->where('nik_id', auth()->user()->id)->first();

        return view('frontend.biodata.index', compact('biodata'));
    }

    public function create()
    {
        abort_if(Gate::denies('biodatum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = User::pluck('name', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.biodata.create', compact('niks'));
    }

    public function store(StoreBiodatumRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        if ($biodata != NULL) {
            if (request()->file('image')) {
                if ($biodata->nidn_file) {
                    Storage::delete($biodata->image);
                }
                $image = request()->file('image')->store('file/image');
            } else {
                $image = $biodata->image;
            }
        } else {
            if (request()->file('image')) {
                $image = request()->file('image')->store('file/image');
            }
            else {
                $image = null;
            }
        }
        if ($biodata != NULL) {
            if (request()->file('nidn_file')) {
                if ($biodata->nidn_file) {
                    Storage::delete($biodata->nidn_file);
                }
                $nidn = request()->file('nidn_file')->store('file/nidn');
            } else {
                $nidn = $biodata->nidn_file;
            }
        } else {
            if (request()->file('nidn_file')) {
                $nidn = request()->file('nidn_file')->store('file/nidn');
            }
            else {
                $nidn = null;
            }
        }

        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'image' => $image,
            'nidn' => request('nidn'),
            'nidn_file' => $nidn,
            'jk' => request('jk'),
            'tl' => request('tl'),
            'tgl' => request('tgl'),
        ]);

        return redirect()->route('frontend.biodata.index');
    }

    public function storekep(Request $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        if ($biodata != NULL) {
            if (request()->file('filektp')) {
                if ($biodata->filektp) {
                    Storage::delete($biodata->filektp);
                }
                $filektp = request()->file('filektp')->store('file/ktp');
            } else {
                $filektp = $biodata->filektp;
            }
        } else {
            if (request()->file('filektp')) {
                $filektp = request()->file('filektp')->store('file/ktp');
            }
            else {
                $filektp = null;
            }
        }
        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'noktp' => request('noktp'),
            'filektp' => $filektp,
            'agama' => request('agama'),
            'kewarnegaraan' => request('kewarnegaraan'),
        ]);

        return redirect()->route('frontend.biodata.index');

    }

    public function storekel(Request $request)
    {
        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'status_nikah' => request('status_nikah'),
            'suami_istri' => request('suami_istri'),
            'nipsuami_istri' => request('nipsuami_istri'),
            'pekerjaan_suami_istri' => request('pekerjaan_suami_istri'),
            'pns_suami_istri' => request('pns_suami_istri'),
        ]);

        return redirect()->route('frontend.biodata.index');

    }

    public function storebid(Request $request)
    {
        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'pendikteks2' => request('pendikteks2'),
            'pendikteks3' => request('pendikteks3'),
            'nosertipen' => request('nosertipen'),
            'nosertikom' => request('nosertikom'),
            'bidangke_1' => request('bidangke_1'),
            'bidangke_2' => request('bidangke_2'),
            'homebase' => request('homebase'),
        ]);

        return redirect()->route('frontend.biodata.index');

    }

    public function storeala(Request $request)
    {
        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'email' => request('email'),
            'alamat' => request('alamat'),
            'rt' => request('rt'),
            'rw' => request('rw'),
            'dusun' => request('dusun'),
            'desa' => request('desa'),
            'kota' => request('kota'),
            'provinsi' => request('provinsi'),
            'kodepos' => request('kodepos'),
            'telp_rumah' => request('telp_rumah'),
            'no_hp' => request('no_hp'),
        ]);

        return redirect()->route('frontend.biodata.index');

    }

    public function storekepe(Request $request)
    {
        
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        if ($biodata != NULL) {
            if (request()->file('sk_yayasandoc')) {
                if ($biodata->sk_yayasandoc != NULL) {
                    Storage::delete($biodata->sk_yayasandoc);
                }
                $sk_yayasandoc = request()->file('sk_yayasandoc')->store('file/sk_yayasandoc');
            } else {
                $sk_yayasandoc = $biodata->sk_yayasandoc;
            }
        } else {
            if (request()->file('sk_yayasandoc')) {
                $sk_yayasandoc = request()->file('sk_yayasandoc')->store('file/sk_yayasandoc');
            }
            else {
                $sk_yayasandoc = null;
            }
        }
        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'prodi' => request('prodi'),
            'nip_pns' => request('nip_pns'),
            'statuskep' => request('statuskep'),
            'institusi' => request('institusi'),
            'bagian' => request('bagian'),
            'status_aktif' => request('status_aktif'),
            'noskyayasan' => request('noskyayasan'),
            'ttg_sk_yayasan' => request('ttg_sk_yayasan'),
            'sk_yayasandoc' => $sk_yayasandoc,
            'nomor_sktmt' => request('nomor_sktmt'),
            'tgl_sktmt' => request('tgl_sktmt'),
            'sumber_gaji' => request('sumber_gaji'),
        ]);

        return redirect()->route('frontend.biodata.index');

    }

    public function storelain(Request $request)
    {
        $biodatum = Biodatum::updateOrCreate([
            'nik_id' => auth()->user()->id
        ],[
            'npwp' => request('npwp'),
            'pajak' => request('pajak'),
            'jabatan' => request('jabatan'),
            'matkul' => request('matkul'),
        ]);

        return redirect()->route('frontend.biodata.index');

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
