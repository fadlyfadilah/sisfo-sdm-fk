<?php

namespace App\Http\Requests;

use App\Models\Impasing;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateImpasingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('impasing_edit');
    }

    public function rules()
    {
        return [
            'nomorskin' => [
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
            'angka_kredit' => [
                'string',
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