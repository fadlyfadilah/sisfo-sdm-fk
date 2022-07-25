<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPendidikanRequest;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use App\Models\Biodatum;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PendidikanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pendidikan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $pendidikans = Pendidikan::with(['biodata'])->where('biodata_id',  $biodata->id)->get();

        return view('frontend.pendidikans.index', compact('pendidikans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pendidikan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.pendidikans.create');
    }

    public function store(StorePendidikanRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('file_ijazah')) {
            $file_ijazah = $request->file('file_ijazah');
            $file_ijazahUrl = $file_ijazah->store("file/pendidikan");
        } else {
            $file_ijazahUrl = NULL;
        }

        $attr['biodata_id'] = $biodata->id;
        $attr['file_ijazah'] = $file_ijazahUrl;
        $pendidikan = Pendidikan::create($request->all());

        return redirect()->route('frontend.pendidikans.index');
    }

    public function edit(Pendidikan $pendidikan)
    {
        abort_if(Gate::denies('pendidikan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendidikan->load('biodata');

        return view('frontend.pendidikans.edit', compact('pendidikan'));
    }

    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($pendidikan->file_ijazah != NULL) {
            if (request()->file('file_ijazah')) {
                Storage::delete($pendidikan->file_ijazah);
                $file_ijazah = request()->file('file_ijazah')->store('file/pendidikan');
            } else {
                $file_ijazah = $pendidikan->file_ijazah;
            }
        } else {
            if ($pendidikan->file_ijazah = NULL) {
                $file_ijazah = request()->file('file_ijazah')->store('file/pendidikan');
            }
            else {
                $file_ijazah = null;
            }
            
        }
        $attr['biodata_id'] = $biodata->id;
        $attr['file_ijazah'] = $file_ijazah;
        $pendidikan->update($request->all());

        return redirect()->route('frontend.pendidikans.index');
    }

    public function show(Pendidikan $pendidikan)
    {
        abort_if(Gate::denies('pendidikan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendidikan->load('biodata');

        return view('frontend.pendidikans.show', compact('pendidikan'));
    }

    public function destroy(Pendidikan $pendidikan)
    {
        abort_if(Gate::denies('pendidikan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendidikan->delete();

        return back();
    }
}