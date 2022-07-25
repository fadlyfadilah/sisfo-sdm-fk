<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\DiklatExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiklatRequest;
use App\Http\Requests\StoreDiklatRequest;
use App\Http\Requests\UpdateDiklatRequest;
use App\Models\Biodatum;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class DiklatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diklat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $diklats = Diklat::with(['biodata'])->where('biodata_id', $biodata->id)->get();

        return view('frontend.diklats.index', compact('diklats'));
    }

    public function create()
    {
        abort_if(Gate::denies('diklat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.diklats.create');
    }

    public function store(StoreDiklatRequest $request)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($request->file('file_diklat')) {
            $file_diklat = $request->file('file_diklat');
            $file_diklatUrl = $file_diklat->store("file/diklat");
        } else {
            $file_diklatUrl = NULL;
        }

        $attr['biodata_id'] = $biodata->id;
        $attr['upload_skin'] = $file_diklatUrl;
        $diklat = Diklat::create($attr);

        return redirect()->route('frontend.diklats.index');
    }

    public function edit(Diklat $diklat)
    {
        abort_if(Gate::denies('diklat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diklat->load('biodata');

        return view('frontend.diklats.edit', compact('diklat'));
    }

    public function update(UpdateDiklatRequest $request, Diklat $diklat)
    {
        $biodata = Biodatum::where('nik_id', auth()->user()->id)->first();
        $attr = $request->all();
        if ($diklat->file_diklat != NULL) {
            if (request()->file('file_diklat')) {
                Storage::delete($diklat->file_diklat);
                $file_diklat = request()->file('file_diklat')->store('file/diklat');
            } else {
                $file_diklat = $diklat->file_diklat;
            }
        } else {
            if ($diklat->file_diklat = NULL) {
                $file_diklat = request()->file('file_diklat')->store('file/diklat');
            }
            else {
                $file_diklat = null;
            }
        }
        $attr['biodata_id'] = $biodata->id;
        $attr['file_diklat'] = $file_diklat;
        $diklat->update($attr);

        return redirect()->route('frontend.diklats.index');
    }

    public function show(Diklat $diklat)
    {
        abort_if(Gate::denies('diklat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diklat->load('biodata');

        return view('frontend.diklats.show', compact('diklat'));
    }

    public function destroy(Diklat $diklat)
    {
        abort_if(Gate::denies('diklat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diklat->delete();

        return back();
    }

    
}