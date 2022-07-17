<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImpasingRequest;
use App\Http\Requests\StoreImpasingRequest;
use App\Http\Requests\UpdateImpasingRequest;
use App\Models\Biodatum;
use App\Models\Impasing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImpasingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('impasing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impasings = Impasing::with(['biodata'])->get();

        return view('admin.impasings.index', compact('impasings'));
    }

    public function create()
    {
        abort_if(Gate::denies('impasing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        return view('admin.impasings.create', compact('biodatas'));
    }

    public function store(StoreImpasingRequest $request)
    {
        $attr = $request->all();
        if ($request->file('upload_skin')) {
            $upload_skin = $request->file('upload_skin');
            $upload_skinUrl = $upload_skin->store("file/impassing");
        } else {
            $upload_skinUrl = NULL;
        }

        $attr['upload_skin'] = $upload_skinUrl;
        $impasing = Impasing::create($attr);

        return redirect()->route('admin.impasings.index');
    }

    public function edit(Impasing $impasing)
    {
        abort_if(Gate::denies('impasing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biodatas = Biodatum::pluck('nidn', 'id')->prepend(trans('Silahkan Pilih'), '');

        $impasing->load('biodata');

        return view('admin.impasings.edit', compact('biodatas', 'impasing'));
    }

    public function update(UpdateImpasingRequest $request, Impasing $impasing)
    {
        $attr = $request->all();
        if ($impasing->upload_skin != NULL) {
            if (request()->file('upload_skin')) {
                Storage::delete($impasing->upload_skin);
                $upload_skin = request()->file('upload_skin')->store('file/impassing');
            } else {
                $upload_skin = $impasing->upload_skin;
            }
        } else {
            $upload_skin = request()->file('upload_skin')->store('file/impassing');
        }
        $attr['upload_skin'] = $upload_skin;
        $impasing->update($attr);

        return redirect()->route('admin.impasings.index');
    }

    public function show(Impasing $impasing)
    {
        abort_if(Gate::denies('impasing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impasing->load('biodata');

        return view('admin.impasings.show', compact('impasing'));
    }

    public function destroy(Impasing $impasing)
    {
        abort_if(Gate::denies('impasing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impasing->delete();

        return back();
    }
}