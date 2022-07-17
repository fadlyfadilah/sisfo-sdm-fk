<?php

namespace App\Http\Requests;

use App\Models\Studi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreStudiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('studi_create');
    }

    public function rules()
    {
        return [
            'jenjang' => [
                'string',
                'nullable',
            ],
            'bidang_studi' => [
                'string',
                'nullable',
            ],
            'univ' => [
                'string',
                'nullable',
            ],
            'negara' => [
                'string',
                'nullable',
            ],
            'mulai' => [
                'string',
                'nullable',
            ],
        ];
    }
}