<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diklat extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const JENIS_DIKLAT_SELECT = [
        'Pekerti'          => 'Pekerti',
        'Applied Approach' => 'Applied Approach',
    ];

    public const TINGKATAN_DIKLAT_SELECT = [
        'Lokal'         => 'Lokal',
        'Regional'      => 'Regional',
        'Nasional'      => 'Nasional',
        'Internasional' => 'Internasional',
    ];

    public const KATEGORI_KEG_SELECT = [
        'Lamanya lebih dari 960 jam'     => 'Lamanya lebih dari 960 jam',
        'Lamanya lebih dari 641-960 jam' => 'Lamanya lebih dari 641-960 jam',
        'Lamanya lebih dari 481-640 jam' => 'Lamanya lebih dari 481-640 jam',
        'Lamanya lebih dari 161-480 jam' => 'Lamanya lebih dari 161-480 jam',
        'Lamanya lebih dari 81-160 jam'  => 'Lamanya lebih dari 81-160 jam',
        'Lamanya lebih dari 31-80jam'    => 'Lamanya lebih dari 31-80jam',
        'Lamanya lebih dari 10-31jam'    => 'Lamanya lebih dari 10-31jam',
    ];

    public $table = 'diklats';

    protected $dates = [
        'tgl_mulai',
        'tgl_selesai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'jenis_diklat',
        'kategori_keg',
        'nama_diklat',
        'tingkatan_diklat',
        'tahun_diklat',
        'penyelenggara',
        'peran',
        'jumlah_jam',
        'tempat',
        'tgl_mulai',
        'tgl_selesai',
        'no_sk',
        'tgl_sk',
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

    public function getTglSelesaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglSelesaiAttribute($value)
    {
        $this->attributes['tgl_selesai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}