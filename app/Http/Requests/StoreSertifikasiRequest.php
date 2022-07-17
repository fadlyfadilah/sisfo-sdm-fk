<?php

namespace App\Http\Requests;

use App\Models\Sertifikasi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreSertifikasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sertifikasi_create');
    }

    public function rules()
    {
        return [
            'bidang_studi' => [
                'string',
                'nullable',
            ],
            'nosk_serti' => [
                'string',
                'nullable',
            ],
            'tahun_serti' => [
                'string',
                'nullable',
            ],
            'no_peserta' => [
                'string',
                'nullable',
            ],
            'noreg' => [
                'string',
                'nullable',
            ],
        ];
    }
}