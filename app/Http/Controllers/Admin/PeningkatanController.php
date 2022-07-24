<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PeningkatanExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeningkatanRequest;
use App\Http\Requests\StorePeningkatanRequest;
use App\Http\Requests\UpdatePeningkatanRequest;
use App\Models\Biodatum;
use App\Models\Peningkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Symfony\Component\HttpFoundation\Response;

class PeningkatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peningkatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peningkatans = Peningkatan::with(['biodata'])->get();

        return view('admin.peningkatans.index', compact('peningkatans'));
    }

    public function create()
    {
        abort_if(Gate::denies('peningkatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih!'), '');

        return view('admin.peningkatans.create', compact('biodatas'));
    }

    public function store(StorePeningkatanRequest $request)
    {
        $peningkatan = Peningkatan::create($request->all());

        return redirect()->route('admin.peningkatans.index');
    }

    public function edit(Peningkatan $peningkatan)
    {
        abort_if(Gate::denies('peningkatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih!'), '');

        $peningkatan->load('biodata');

        return view('admin.peningkatans.edit', compact('biodatas', 'peningkatan'));
    }

    public function update(UpdatePeningkatanRequest $request, Peningkatan $peningkatan)
    {
        $peningkatan->update($request->all());

        return redirect()->route('admin.peningkatans.index');
    }

    public function show(Peningkatan $peningkatan)
    {
        abort_if(Gate::denies('peningkatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peningkatan->load('biodata');

        return view('admin.peningkatans.show', compact('peningkatan'));
    }

    public function destroy(Peningkatan $peningkatan)
    {
        abort_if(Gate::denies('peningkatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peningkatan->delete();

        return back();
    }
    public function export()
    {
        return FacadesExcel::download(new PeningkatanExport, 'Export Data Kompetensi Dosen.xlsx');
    }
}