<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJafungRequest;
use App\Http\Requests\StoreJafungRequest;
use App\Http\Requests\UpdateJafungRequest;
use App\Models\Biodatum;
use App\Models\Jafung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class JafungController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jafung_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jafungs = Jafung::with(['biodata'])->get();

        return view('admin.jafungs.index', compact('jafungs'));
    }

    public function create()
    {
        abort_if(Gate::denies('jafung_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.jafungs.create', compact('biodatas'));
    }

    public function store(StoreJafungRequest $request)
    {
        $attr = $request->all();
        if ($request->file('file_jabfung')) {
            $file_jabfung = $request->file('file_jabfung');
            $file_jabfungUrl = $file_jabfung->store("file/jabfung");
        } else {
            $file_jabfungUrl = NULL;
        }

        $attr['file_jabfung'] = $file_jabfungUrl;
        $jafung = Jafung::create($attr);

        return redirect()->route('admin.jafungs.index');
    }

    public function edit(Jafung $jafung)
    {
        abort_if(Gate::denies('jafung_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $jafung->load('biodata');

        return view('admin.jafungs.edit', compact('biodatas', 'jafung'));
    }

    public function update(UpdateJafungRequest $request, Jafung $jafung)
    {
        $attr = $request->all();
        if ($jafung->file_jabfung != NULL) {
            if (request()->file('file_jabfung')) {
                Storage::delete($jafung->file_jabfung);
                $file_jabfung = request()->file('file_jabfung')->store('file/jabfung');
            } else {
                $file_jabfung = $jafung->file_jabfung;
            }
        } else {
            $file_jabfung = request()->file('file_jabfung')->store('file/jabfung');
        }
        $attr['file_jabfung'] = $file_jabfung;
        
        $jafung->update($request->all());

        return redirect()->route('admin.jafungs.index');
    }

    public function show(Jafung $jafung)
    {
        abort_if(Gate::denies('jafung_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jafung->load('biodata');

        return view('admin.jafungs.show', compact('jafung'));
    }

    public function destroy(Jafung $jafung)
    {
        abort_if(Gate::denies('jafung_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jafung->delete();

        return back();
    }

}