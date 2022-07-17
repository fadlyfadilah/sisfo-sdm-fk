<?php

namespace App\Http\Requests;

use App\Models\Biodatum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdateBiodatumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('biodatum_edit');
    }

    public function rules()
    {
        return [
            'nidn' => [
                'string',
                'nullable',
            ],
            'nidn_file' => [
                'string',
                'nullable',
            ],
            'tl' => [
                'string',
                'nullable',
            ],
            'tgl' => [
                'string',
                'nullable',
            ],
            'noktp' => [
                'string',
                'nullable',
            ],
            'filektp' => [
                'string',
                'nullable',
            ],
            'agama' => [
                'string',
                'nullable',
            ],
            'kewarnegaraan' => [
                'string',
                'nullable',
            ],
            'status_nikah' => [
                'string',
                'nullable',
            ],
            'suami_istri' => [
                'string',
                'nullable',
            ],
            'nipsuami_istri' => [
                'string',
                'nullable',
            ],
            'pekerjaan_suami_istri' => [
                'string',
                'nullable',
            ],
            'pns_suami_istri' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'bidangke_1' => [
                'string',
                'nullable',
            ],
            'bidangke_2' => [
                'string',
                'nullable',
            ],
            'rt' => [
                'string',
                'nullable',
            ],
            'rw' => [
                'string',
                'nullable',
            ],
            'dusun' => [
                'string',
                'nullable',
            ],
            'desa' => [
                'string',
                'nullable',
            ],
            'kota' => [
                'string',
                'nullable',
            ],
            'provinsi' => [
                'string',
                'nullable',
            ],
            'kodepos' => [
                'string',
                'nullable',
            ],
            'telp_rumah' => [
                'string',
                'nullable',
            ],
            'no_hp' => [
                'string',
                'nullable',
            ],
            'prodi' => [
                'string',
                'nullable',
            ],
            'nip_pns' => [
                'string',
                'nullable',
            ],
            'status_aktif' => [
                'string',
                'nullable',
            ],
            'sk_yayasandoc' => [
                'string',
                'nullable',
            ],
            'nomor_sktmt' => [
                'string',
                'nullable',
            ],
            'sumber_gaji' => [
                'string',
                'nullable',
            ],
            'npwp' => [
                'string',
                'nullable',
            ],
            'pajak' => [
                'string',
                'nullable',
            ],
            'jabatan' => [
                'string',
                'nullable',
            ],
        ];
    }
}