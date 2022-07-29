<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peningkatan extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public const AKADEMIK_SELECT = [
        '2021/2022 Ganjil' => '2021/2022 Ganjil',
        '2021/2022 Genap'  => '2021/2022 Genap',
        '2022/2023 Ganjil' => '2022/2023 Ganjil',
        '2022/2023 Genap'  => '2022/2023 Genap',
        '2023/2024 Ganjil' => '2023/2024 Ganjil',
        '2023/2024 Genap'  => '2023/2024 Genap',
    ];

    public const PERAN_SELECT = [
        'Penyaji' => 'Penyaji',
        'Peserta' => 'Peserta',
    ];

    public const TINGKATAN_KEGIATAN_SELECT = [
        'Lokal'         => 'Lokal/Wilayah',
        'Nasional'      => 'Nasional',
        'Internasional' => 'Internasional',
    ];

    public const JENIS_KEGIATAN_SELECT = [
        'Seminar Ilmiah'      => 'Seminar ilmiah',
        'Lokakarya'           => 'Lokakarya',
        'Penataran/Pelatihan' => 'Penataran/Pelatihan',
        'Workshop'            => 'Workshop',
        'Pagelaran'           => 'Pagelaran',
        'Pameran'             => 'Pameran',
        'Peragaan'            => 'Peragaan',
    ];

    public $table = 'peningkatans';

    protected $dates = [
        'tgl_mulai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'jenis_kegiatan',
        'nama_kegiatan',
        'tempat',
        'tgl_mulai',
        'peran',
        'tingkatan_kegiatan',
        'tahun_kegiatan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodatum::class, 'biodata_id');
    }

    public function getTglMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglMulaiAttribute($value)
    {
        $this->attributes['tgl_mulai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}