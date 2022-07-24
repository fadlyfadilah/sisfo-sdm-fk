<?php

namespace App\Http\Controllers\Admin;

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

        $diklats = Diklat::with(['biodata'])->get();

        return view('admin.diklats.index', compact('diklats'));
    }

    public function create()
    {
        abort_if(Gate::denies('diklat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.diklats.create', compact('biodatas'));
    }

    public function store(StoreDiklatRequest $request)
    {
        $attr = $request->all();
        if ($request->file('file_diklat')) {
            $file_diklat = $request->file('file_diklat');
            $file_diklatUrl = $file_diklat->store("file/diklat");
        } else {
            $file_diklatUrl = NULL;
        }

        $attr['upload_skin'] = $file_diklatUrl;
        $diklat = Diklat::create($attr);

        return redirect()->route('admin.diklats.index');
    }

    public function edit(Diklat $diklat)
    {
        abort_if(Gate::denies('diklat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $diklat->load('biodata');

        return view('admin.diklats.edit', compact('biodatas', 'diklat'));
    }

    public function update(UpdateDiklatRequest $request, Diklat $diklat)
    {
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
        $attr['file_diklat'] = $file_diklat;
        $diklat->update($attr);

        return redirect()->route('admin.diklats.index');
    }

    public function show(Diklat $diklat)
    {
        abort_if(Gate::denies('diklat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diklat->load('biodata');

        return view('admin.diklats.show', compact('diklat'));
    }

    public function destroy(Diklat $diklat)
    {
        abort_if(Gate::denies('diklat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diklat->delete();

        return back();
    }

    
}