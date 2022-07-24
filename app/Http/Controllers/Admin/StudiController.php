<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudiExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStudiRequest;
use App\Http\Requests\StoreStudiRequest;
use App\Http\Requests\UpdateStudiRequest;
use App\Models\Biodatum;
use App\Models\Studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class StudiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('studi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studis = Studi::with(['biodata'])->get();

        return view('admin.studis.index', compact('studis'));
    }

    public function create()
    {
        abort_if(Gate::denies('studi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.studis.create', compact('biodatas'));
    }

    public function store(StoreStudiRequest $request)
    {
        $studi = Studi::create($request->all());

        return redirect()->route('admin.studis.index');
    }

    public function edit(Studi $studi)
    {
        abort_if(Gate::denies('studi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $studi->load('biodata');

        return view('admin.studis.edit', compact('biodatas', 'studi'));
    }

    public function update(UpdateStudiRequest $request, Studi $studi)
    {
        $studi->update($request->all());

        return redirect()->route('admin.studis.index');
    }

    public function show(Studi $studi)
    {
        abort_if(Gate::denies('studi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studi->load('biodata');

        return view('admin.studis.show', compact('studi'));
    }

    public function destroy(Studi $studi)
    {
        abort_if(Gate::denies('studi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studi->delete();

        return back();
    }
    public function export()
    {
        return Excel::download(new StudiExport, 'Export Data Studi Dosen.xlsx');
    }
}