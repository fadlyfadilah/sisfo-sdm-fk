<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJafungRequest;
use App\Http\Requests\StoreJafungRequest;
use App\Http\Requests\UpdateJafungRequest;
use App\Models\Biodatum;
use App\Models\Jafung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class JafungController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jafung_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $jafungs = Jafung::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.jafungs.index', compact('jafungs'));
    }

    public function create()
    {
        abort_if(Gate::denies('jafung_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.jafungs.create');
    }

    public function store(StoreJafungRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('file_jabfung')) {
            $file_jabfung = $request->file('file_jabfung');
            $file_jabfungUrl = $file_jabfung->store("file/jabfung");
        } else {
            $file_jabfungUrl = NULL;
        }

        $attr['biodata_id'] = $biodata->id;
        $attr['file_jabfung'] = $file_jabfungUrl;
        $jafung = Jafung::create($attr);

        return redirect()->route('frontend.jafungs.index');
    }

    public function edit(Jafung $jafung)
    {
        abort_if(Gate::denies('jafung_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.jafungs.edit', compact('jafung'));
    }

    public function update(UpdateJafungRequest $request, Jafung $jafung)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($jafung->file_jabfung != NULL) {
            if (request()->file('file_jabfung')) {
                Storage::delete($jafung->file_jabfung);
                $file_jabfung = request()->file('file_jabfung')->store('file/jabfung');
            } else {
                $file_jabfung = $jafung->file_jabfung;
            }
        } else {
            if ($jafung->file_jabfung = NULL) {
                $file_jabfung = request()->file('file_jabfung')->store('file/jabfung');
            }
            else {
                $file_jabfung = null;
            }
            
        }
        $attr['biodata_id'] = $biodata->id;
        $attr['file_jabfung'] = $file_jabfung;
        
        $jafung->update($request->all());

        return redirect()->route('frontend.jafungs.index');
    }

    public function show(Jafung $jafung)
    {
        abort_if(Gate::denies('jafung_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jafung->load('biodata');

        return view('frontend.jafungs.show', compact('jafung'));
    }

    public function destroy(Jafung $jafung)
    {
        abort_if(Gate::denies('jafung_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jafung->delete();

        return back();
    }

}