<?php

namespace App\Http\Controllers\Frontend;

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

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $tahun = session('tahun');
        if (session()->has('tahun')) {
            if ($tahun == '2021/2022 Ganjil') {
                $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2021/2022 Genap') {
                $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2022/2023 Ganjil') {
                $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2022/2023 Genap') {
                $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } elseif ($tahun == '2023/2024 Ganjil') {
                $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            } else {
                $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
            }
        } else {
            $studis = Studi::with(['biodata'])->where('biodata_id', $biodata->id)->where('akademik', $tahun)->get();
        }
        return view('frontend.studis.index', compact('studis'));
    }

    public function create()
    {
        abort_if(Gate::denies('studi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.studis.create');
    }

    public function store(StoreStudiRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        $attr['biodata_id'] = $biodata->id;

        $studi = Studi::create($attr);

        return redirect()->route('frontend.studis.index');
    }

    public function edit(Studi $studi)
    {
        abort_if(Gate::denies('studi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studi->load('biodata');

        return view('frontend.studis.edit', compact('studi'));
    }

    public function update(UpdateStudiRequest $request, Studi $studi)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        $attr['biodata_id'] = $biodata->id;
        $studi->update($attr);

        return redirect()->route('frontend.studis.index');
    }

    public function show(Studi $studi)
    {
        abort_if(Gate::denies('studi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studi->load('biodata');

        return view('frontend.studis.show', compact('studi'));
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