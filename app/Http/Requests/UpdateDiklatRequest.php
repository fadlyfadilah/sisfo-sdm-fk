<?php

namespace App\Http\Requests;

use App\Models\Diklat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateDiklatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('diklat_edit');
    }

    public function rules()
    {
        return [
            'nama_diklat' => [
                'string',
                'nullable',
            ],
            'tahun_diklat' => [
                'string',
                'nullable',
            ],
            'penyelenggara' => [
                'string',
                'nullable',
            ],
            'peran' => [
                'string',
                'nullable',
            ],
            'jumlah_jam' => [
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
            'tgl_selesai' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'no_sk' => [
                'string',
                'nullable',
            ],
            'tgl_sk' => [
                'string',
                'nullable',
            ],
        ];
    }
}