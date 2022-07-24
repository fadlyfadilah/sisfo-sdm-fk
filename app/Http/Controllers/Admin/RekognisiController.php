<?php

namespace App\Http\Controllers\Admin;

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

        $rekognisis = Rekognisi::with(['biodata'])->get();

        return view('admin.rekognisis.index', compact('rekognisis'));
    }

    public function create()
    {
        abort_if(Gate::denies('rekognisi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.rekognisis.create', compact('biodatas'));
    }

    public function store(StoreRekognisiRequest $request)
    {
        $rekognisi = Rekognisi::create($request->all());

        return redirect()->route('admin.rekognisis.index');
    }

    public function edit(Rekognisi $rekognisi)
    {
        abort_if(Gate::denies('rekognisi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $rekognisi->load('biodata');

        return view('admin.rekognisis.edit', compact('biodatas', 'rekognisi'));
    }

    public function update(UpdateRekognisiRequest $request, Rekognisi $rekognisi)
    {
        $rekognisi->update($request->all());

        return redirect()->route('admin.rekognisis.index');
    }

    public function show(Rekognisi $rekognisi)
    {
        abort_if(Gate::denies('rekognisi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekognisi->load('biodata');

        return view('admin.rekognisis.show', compact('rekognisi'));
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