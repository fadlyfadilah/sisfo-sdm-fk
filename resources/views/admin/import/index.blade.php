@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Import User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.import.users') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="file" class="col-md-4 col-form-label text-md-end">File</label>

                            <div class="col-md-6">
                                <input id="file" name="file" type="file" class="form-control-file">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Import
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <img src="" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
