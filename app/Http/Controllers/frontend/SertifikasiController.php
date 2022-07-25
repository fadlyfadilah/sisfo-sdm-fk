<?php

namespace App\Http\Controllers\Frontend;

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

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $sertifikasis = Sertifikasi::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.sertifikasis.index', compact('sertifikasis'));
    }

    public function create()
    {
        abort_if(Gate::denies('sertifikasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sertifikasis.create');
    }

    public function store(StoreSertifikasiRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('file_serdos')) {
            $file_serdos = $request->file('file_serdos');
            $file_serdosUrl = $file_serdos->store("file/serdos");
        } else {
            $file_serdosUrl = NULL;
        }

        $attr['biodata_id'] = $biodata->id;
        $attr['file_serdos'] = $file_serdosUrl;
        $sertifikasi = Sertifikasi::create($attr);

        return redirect()->route('frontend.sertifikasis.index');
    }

    public function edit(Sertifikasi $sertifikasi)
    {
        abort_if(Gate::denies('sertifikasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasi->load('biodata');

        return view('frontend.sertifikasis.edit', compact('sertifikasi'));
    }

    public function update(UpdateSertifikasiRequest $request, Sertifikasi $sertifikasi)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
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
        $attr['biodata_id'] = $biodata->id;
        $attr['file_serdos'] = $file_serdos;
        $sertifikasi->update($attr);

        return redirect()->route('frontend.sertifikasis.index');
    }

    public function show(Sertifikasi $sertifikasi)
    {
        abort_if(Gate::denies('sertifikasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasi->load('biodata');

        return view('frontend.sertifikasis.show', compact('sertifikasi'));
    }

    public function destroy(Sertifikasi $sertifikasi)
    {
        abort_if(Gate::denies('sertifikasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasi->delete();

        return back();
    }
}