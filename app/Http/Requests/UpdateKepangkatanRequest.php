<?php

namespace App\Http\Requests;

use App\Models\Kepangkatan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateKepangkatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kepangkatan_edit');
    }

    public function rules()
    {
        return [
            'nomorsk' => [
                'string',
                'nullable',
            ],
            'tgl_skin' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tmtskin' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'masa_kerja' => [
                'string',
                'nullable',
            ],
            'masa_bulan' => [
                'string',
                'nullable',
            ],
        ];
    }
}