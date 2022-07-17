<?php

namespace App\Http\Requests;

use App\Models\Pendidikan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdatePendidikanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pendidikan_edit');
    }

    public function rules()
    {
        return [
            'perguruan_tinggi' => [
                'string',
                'nullable',
            ],
            'program_studi' => [
                'string',
                'nullable',
            ],
            'gelar_akademik' => [
                'string',
                'nullable',
            ],
            'bidang_studi' => [
                'string',
                'nullable',
            ],
            'thn_masuk' => [
                'string',
                'nullable',
            ],
            'tahun_lulus' => [
                'string',
                'nullable',
            ],
            'tanggal_lulus' => [
                'string',
                'nullable',
            ],
            'no_induk' => [
                'string',
                'nullable',
            ],
            'jumlah_sks' => [
                'string',
                'nullable',
            ],
            'ipk_lulus' => [
                'string',
                'nullable',
            ],
            'sk_setara' => [
                'string',
                'nullable',
            ],
            'tgl_setara' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'no_ijazah' => [
                'string',
                'nullable',
            ],
            'tesis_diser' => [
                'string',
                'nullable',
            ],
        ];
    }
}