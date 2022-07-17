<?php

namespace App\Http\Requests;

use App\Models\Rekognisi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateRekognisiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rekognisi_edit');
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