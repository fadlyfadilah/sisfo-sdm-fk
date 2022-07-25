<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\RekognisiExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRekognisiRequest;
use App\Http\Requests\StoreRekognisiRequest;
use App\Http\Requests\UpdateRekognisiRequest;
use App\Models\Biodatum;
use App\Models\Rekognisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class RekognisiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rekognisi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $rekognisis = Rekognisi::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.rekognisis.index', compact('rekognisis'));
    }

    public function create()
    {
        abort_if(Gate::denies('rekognisi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.rekognisis.create');
    }

    public function store(StoreRekognisiRequest $request)
    {
        $attr = $request->all();
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr['biodata_id'] = $biodata->id;
        $rekognisi = Rekognisi::create($attr);

        return redirect()->route('frontend.rekognisis.index');
    }

    public function edit(Rekognisi $rekognisi)
    {
        abort_if(Gate::denies('rekognisi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekognisi->load('biodata');

        return view('frontend.rekognisis.edit', compact('rekognisi'));
    }

    public function update(UpdateRekognisiRequest $request, Rekognisi $rekognisi)
    {
        $attr = $request->all();
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr['biodata_id'] = $biodata->id;
        $rekognisi->update($attr);

        return redirect()->route('frontend.rekognisis.index');
    }

    public function show(Rekognisi $rekognisi)
    {
        abort_if(Gate::denies('rekognisi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekognisi->load('biodata');

        return view('frontend.rekognisis.show', compact('rekognisi'));
    }

    public function destroy(Rekognisi $rekognisi)
    {
        abort_if(Gate::denies('rekognisi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekognisi->delete();

        return back();
    }
    public function export()
    {
        return Excel::download(new RekognisiExport, 'Export Data Rekognisi.xlsx');
    }
}