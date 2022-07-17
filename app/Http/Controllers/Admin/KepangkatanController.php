<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKepangkatanRequest;
use App\Http\Requests\StoreKepangkatanRequest;
use App\Http\Requests\UpdateKepangkatanRequest;
use App\Models\Biodatum;
use App\Models\Kepangkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class KepangkatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kepangkatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kepangkatans = Kepangkatan::with(['biodata'])->get();

        return view('admin.kepangkatans.index', compact('kepangkatans'));
    }

    public function create()
    {
        abort_if(Gate::denies('kepangkatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.kepangkatans.create', compact('biodatas'));
    }

    public function store(StoreKepangkatanRequest $request)
    {
        $attr = $request->all();
        if ($request->file('upload_sk')) {
            $upload_sk = $request->file('upload_sk');
            $upload_skUrl = $upload_sk->store("file/kepangkatan");
        } else {
            $upload_skUrl = NULL;
        }

        $attr['upload_sk'] = $upload_skUrl;
        $kepangkatan = Kepangkatan::create($attr);

        return redirect()->route('admin.kepangkatans.index');
    }

    public function edit(Kepangkatan $kepangkatan)
    {
        abort_if(Gate::denies('kepangkatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $kepangkatan->load('biodata');

        return view('admin.kepangkatans.edit', compact('biodatas', 'kepangkatan'));
    }

    public function update(UpdateKepangkatanRequest $request, Kepangkatan $kepangkatan)
    {
        $attr = $request->all();
        if ($kepangkatan->upload_sk != NULL) {
            if (request()->file('upload_sk')) {
                Storage::delete($kepangkatan->upload_sk);
                $upload_sk = request()->file('upload_sk')->store('file/kepangkatan');
            } else {
                $upload_sk = $kepangkatan->upload_sk;
            }
        } else {
            $upload_sk = request()->file('upload_sk')->store('file/kepangkatan');
        }
        $attr['upload_sk'] = $upload_sk;
        $kepangkatan->update($request->all());

        return redirect()->route('admin.kepangkatans.index');
    }

    public function show(Kepangkatan $kepangkatan)
    {
        abort_if(Gate::denies('kepangkatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kepangkatan->load('biodata');

        return view('admin.kepangkatans.show', compact('kepangkatan'));
    }

    public function destroy(Kepangkatan $kepangkatan)
    {
        abort_if(Gate::denies('kepangkatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kepangkatan->delete();

        return back();
    }
}