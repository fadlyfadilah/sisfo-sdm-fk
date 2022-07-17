<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendidikan extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pendidikans';

    protected $dates = [
        'tgl_setara',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'perguruan_tinggi',
        'program_studi',
        'gelar_akademik',
        'bidang_studi',
        'thn_masuk',
        'tahun_lulus',
        'tanggal_lulus',
        'no_induk',
        'jumlah_sks',
        'ipk_lulus',
        'sk_setara',
        'tgl_setara',
        'no_ijazah',
        'tesis_diser',
        'file_ijazah',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodatum::class, 'biodata_id');
    }

    public function getTglSetaraAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglSetaraAttribute($value)
    {
        $this->attributes['tgl_setara'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}