<?php

namespace App\Http\Requests;

use App\Models\Sertifikasiprof;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateSertifikasiprofRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sertifikasiprof_edit');
    }

    public function rules()
    {
        return [
            'bidang_studi' => [
                'string',
                'nullable',
            ],
            'no_re' => [
                'string',
                'nullable',
            ],
            'no_sk' => [
                'string',
                'nullable',
            ],
            'tahun_serti' => [
                'string',
                'nullable',
            ],
        ];
    }
}