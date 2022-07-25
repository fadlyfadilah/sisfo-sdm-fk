<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImpasingRequest;
use App\Http\Requests\StoreImpasingRequest;
use App\Http\Requests\UpdateImpasingRequest;
use App\Models\Biodatum;
use App\Models\Impasing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImpasingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('impasing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $impasings = Impasing::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.impasings.index', compact('impasings'));
    }

    public function create()
    {
        abort_if(Gate::denies('impasing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.impasings.create');
    }

    public function store(StoreImpasingRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('upload_skin')) {
            $upload_skin = $request->file('upload_skin');
            $upload_skinUrl = $upload_skin->store("file/impassing");
        } else {
            $upload_skinUrl = NULL;
        }

        $attr['upload_skin'] = $upload_skinUrl;
        $attr['biodata_id'] = $biodata->id;
        $impasing = Impasing::create($attr);

        return redirect()->route('frontend.impasings.index');
    }

    public function edit(Impasing $impasing)
    {
        abort_if(Gate::denies('impasing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('frontend.impasings.edit', compact('impasing'));
    }
    
    public function update(UpdateImpasingRequest $request, Impasing $impasing)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($impasing->upload_skin != NULL) {
            if (request()->file('upload_skin')) {
                Storage::delete($impasing->upload_skin);
                $upload_skin = request()->file('upload_skin')->store('file/impassing');
            } else {
                $upload_skin = $impasing->upload_skin;
            }
        } else {
            if ($impasing->upload_skin = NULL) {
                $upload_skin = request()->file('upload_skin')->store('file/impassing');
            }
            else {
                $upload_skin = null;
            }
            
        }
        $attr['biodata_id'] = $biodata->id;
        $attr['upload_skin'] = $upload_skin;
        $impasing->update($attr);

        return redirect()->route('frontend.impasings.index');
    }

    public function show(Impasing $impasing)
    {
        abort_if(Gate::denies('impasing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impasing->load('biodata');

        return view('frontend.impasings.show', compact('impasing'));
    }

    public function destroy(Impasing $impasing)
    {
        abort_if(Gate::denies('impasing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $impasing->upload_skin != NULL ? Storage::delete($impasing->upload_skin) : NULL;

        $impasing->delete();

        return back();
    }
}