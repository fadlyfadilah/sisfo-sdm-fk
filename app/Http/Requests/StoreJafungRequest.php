<?php

namespace App\Http\Requests;

use App\Models\Jafung;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreJafungRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jafung_create');
    }

    public function rules()
    {
        return [
            'no_skjab' => [
                'string',
                'nullable',
            ],
            'tmt_jab' => [
                'string',
                'nullable',
            ],
            'leb_ajar' => [
                'string',
                'nullable',
            ],
            'leb_pen' => [
                'string',
                'nullable',
            ],
            'leb_pkm' => [
                'string',
                'nullable',
            ],
            'leb_penun' => [
                'string',
                'nullable',
            ]
        ];
    }
}