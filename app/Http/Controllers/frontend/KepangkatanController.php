<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKepangkatanRequest;
use App\Http\Requests\StoreKepangkatanRequest;
use App\Http\Requests\UpdateKepangkatanRequest;
use App\Models\Biodatum;
use App\Models\Kepangkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class KepangkatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kepangkatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $kepangkatans = Kepangkatan::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.kepangkatans.index', compact('kepangkatans'));
    }

    public function create()
    {
        abort_if(Gate::denies('kepangkatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.kepangkatans.create');
    }

    public function store(StoreKepangkatanRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('upload_sk')) {
            $upload_sk = $request->file('upload_sk');
            $upload_skUrl = $upload_sk->store("file/kepangkatan");
        } else {
            $upload_skUrl = NULL;
        }

        $attr['biodata_id'] = $biodata->id;
        $attr['upload_sk'] = $upload_skUrl;
        $kepangkatan = Kepangkatan::create($attr);

        return redirect()->route('frontend.kepangkatans.index');
    }

    public function edit(Kepangkatan $kepangkatan)
    {
        abort_if(Gate::denies('kepangkatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kepangkatan->load('biodata');

        return view('frontend.kepangkatans.edit', compact('kepangkatan'));
    }

    public function update(UpdateKepangkatanRequest $request, Kepangkatan $kepangkatan)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($kepangkatan->upload_sk != NULL) {
            if (request()->file('upload_sk')) {
                Storage::delete($kepangkatan->upload_sk);
                $upload_sk = request()->file('upload_sk')->store('file/kepangkatan');
            } else {
                $upload_sk = $kepangkatan->upload_sk;
            }
        } else {
            if ($kepangkatan->upload_sk = NULL) {
                $upload_sk = request()->file('upload_sk')->store('file/kepangkatan');
            }
            else {
                $upload_sk = null;
            }
            
        }
        $attr['biodata_id'] = $biodata->id;
        $attr['upload_sk'] = $upload_sk;
        $kepangkatan->update($request->all());

        return redirect()->route('frontend.kepangkatans.index');
    }

    public function show(Kepangkatan $kepangkatan)
    {
        abort_if(Gate::denies('kepangkatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kepangkatan->load('biodata');

        return view('frontend.kepangkatans.show', compact('kepangkatan'));
    }

    public function destroy(Kepangkatan $kepangkatan)
    {
        abort_if(Gate::denies('kepangkatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kepangkatan->delete();

        return back();
    }
}