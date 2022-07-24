<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySertifikasiRequest;
use App\Http\Requests\StoreSertifikasiRequest;
use App\Http\Requests\UpdateSertifikasiRequest;
use App\Models\Biodatum;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SertifikasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sertifikasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasis = Sertifikasi::with(['biodata'])->get();

        return view('admin.sertifikasis.index', compact('sertifikasis'));
    }

    public function create()
    {
        abort_if(Gate::denies('sertifikasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.sertifikasis.create', compact('biodatas'));
    }

    public function store(StoreSertifikasiRequest $request)
    {
        $attr = $request->all();
        if ($request->file('file_serdos')) {
            $file_serdos = $request->file('file_serdos');
            $file_serdosUrl = $file_serdos->store("file/serdos");
        } else {
            $file_serdosUrl = NULL;
        }

        $attr['file_serdos'] = $file_serdosUrl;
        $sertifikasi = Sertifikasi::create($attr);

        return redirect()->route('admin.sertifikasis.index');
    }

    public function edit(Sertifikasi $sertifikasi)
    {
        abort_if(Gate::denies('sertifikasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $sertifikasi->load('biodata');

        return view('admin.sertifikasis.edit', compact('biodatas', 'sertifikasi'));
    }

    public function update(UpdateSertifikasiRequest $request, Sertifikasi $sertifikasi)
    {
        $attr = $request->all();
        if ($sertifikasi->file_serdos != NULL) {
            if (request()->file('file_serdos')) {
                Storage::delete($sertifikasi->file_serdos);
                $file_serdos = request()->file('file_serdos')->store('file/serdos');
            } else {
                $file_serdos = $sertifikasi->file_serdos;
            }
        } else {
            if ($sertifikasi->file_serdos = NULL) {
                $file_serdos = request()->file('file_serdos')->store('file/serdos');
            }
            else {
                $file_serdos = null;
            }
            
        }
        $attr['file_serdos'] = $file_serdos;
        $sertifikasi->update($attr);

        return redirect()->route('admin.sertifikasis.index');
    }

    public function show(Sertifikasi $sertifikasi)
    {
        abort_if(Gate::denies('sertifikasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasi->load('biodata');

        return view('admin.sertifikasis.show', compact('sertifikasi'));
    }

    public function destroy(Sertifikasi $sertifikasi)
    {
        abort_if(Gate::denies('sertifikasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasi->delete();

        return back();
    }
}