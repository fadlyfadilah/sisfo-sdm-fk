<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySertifikasiprofRequest;
use App\Http\Requests\StoreSertifikasiprofRequest;
use App\Http\Requests\UpdateSertifikasiprofRequest;
use App\Models\Biodatum;
use App\Models\Sertifikasiprof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SertifikasiprofController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sertifikasiprof_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $sertifikasiprofs = Sertifikasiprof::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.sertifikasiprofs.index', compact('sertifikasiprofs'));
    }

    public function create()
    {
        abort_if(Gate::denies('sertifikasiprof_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sertifikasiprofs.create');
    }

    public function store(StoreSertifikasiprofRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('file_serti')) {
            $file_serti = $request->file('file_serti');
            $file_sertiUrl = $file_serti->store("file/sertiprof");
        } else {
            $file_sertiUrl = NULL;
        }

        $attr['biodata_id'] = $biodata->id;
        $attr['file_serti'] = $file_sertiUrl;
        $sertifikasiprof = Sertifikasiprof::create($attr);

        return redirect()->route('frontend.sertifikasiprofs.index');
    }

    public function edit(Sertifikasiprof $sertifikasiprof)
    {
        abort_if(Gate::denies('sertifikasiprof_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasiprof->load('biodata');

        return view('frontend.sertifikasiprofs.edit', compact('sertifikasiprof'));
    }

    public function update(UpdateSertifikasiprofRequest $request, Sertifikasiprof $sertifikasiprof)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($sertifikasiprof->file_serti != NULL) {
            if (request()->file('file_serti')) {
                Storage::delete($sertifikasiprof->file_serti);
                $file_serti = request()->file('file_serti')->store('file/sertiprof');
            } else {
                $file_serti = $sertifikasiprof->file_serti;
            }
        } else {
            if ($sertifikasiprof->file_serti = NULL) {
                $file_serti = request()->file('file_serti')->store('file/sertiprof');
            }
            else {
                $file_serti = null;
            }
            
        }
        $attr['biodata_id'] = $biodata->id;
        $attr['file_serti'] = $file_serti;
        $sertifikasiprof->update($attr);

        return redirect()->route('frontend.sertifikasiprofs.index');
    }

    public function show(Sertifikasiprof $sertifikasiprof)
    {
        abort_if(Gate::denies('sertifikasiprof_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasiprof->load('biodata');

        return view('frontend.sertifikasiprofs.show', compact('sertifikasiprof'));
    }

    public function destroy(Sertifikasiprof $sertifikasiprof)
    {
        abort_if(Gate::denies('sertifikasiprof_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sertifikasiprof->delete();

        return back();
    }
}