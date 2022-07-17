<?php

namespace App\Http\Requests;

use App\Models\Rekognisi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreRekognisiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rekognisi_create');
    }

    public function rules()
    {
        return [
            'bidangahli' => [
                'string',
                'nullable',
            ],
            'rekognisi' => [
                'string',
                'nullable',
            ],
        ];
    }
}