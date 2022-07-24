<?php

namespace App\Http\Requests;

use App\Models\Peningkatan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdatePeningkatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('peningkatan_edit');
    }

    public function rules()
    {
        return [
            'nama_kegiatan' => [
                'string',
                'nullable',
            ],
            'tempat' => [
                'string',
                'nullable',
            ],
            'tgl_mulai' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tahun_kegiatan' => [
                'string',
                'nullable',
            ],
        ];
    }
}