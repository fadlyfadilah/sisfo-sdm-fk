<?php

namespace App\Http\Controllers\Frontend;

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

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $tahun = session('tahun');
        if (session()->has('tahun')) {
            if ($tahun == '2021/2022 Ganjil') {
                $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2021/2022 Genap') {
                $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2022/2023 Ganjil') {
                $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2022/2023 Genap') {
                $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2023/2024 Ganjil') {
                $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } else {
                $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            }
        } else {
            $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
        }
        $peningkatans = Peningkatan::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.peningkatans.index', compact('peningkatans'));
    }

    public function create()
    {
        abort_if(Gate::denies('peningkatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.peningkatans.create');
    }

    public function store(StorePeningkatanRequest $request)
    {
        $attr = $request->all();
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr['biodata_id'] = $biodata->id;
        $peningkatan = Peningkatan::create($attr);

        return redirect()->route('frontend.peningkatans.index');
    }

    public function edit(Peningkatan $peningkatan)
    {
        abort_if(Gate::denies('peningkatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peningkatan->load('biodata');

        return view('frontend.peningkatans.edit', compact('peningkatan'));
    }

    public function update(UpdatePeningkatanRequest $request, Peningkatan $peningkatan)
    {
        $attr = $request->all();
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr['biodata_id'] = $biodata->id;
        $peningkatan->update($attr);

        return redirect()->route('frontend.peningkatans.index');
    }

    public function show(Peningkatan $peningkatan)
    {
        abort_if(Gate::denies('peningkatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peningkatan->load('biodata');

        return view('frontend.peningkatans.show', compact('peningkatan'));
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