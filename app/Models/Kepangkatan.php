<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kepangkatan extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const GOL_SELECT = [
        'I/a (Juru Muda)'            => 'I/a (Juru Muda)',
        'I/b (Juru Muda Tk. 1)'      => 'I/b (Juru Muda Tk. 1)',
        'II/a (Pengatur Muda)'       => 'II/a (Pengatur Muda)',
        'II/b (Pengatur Muda Tk.1)'  => 'II/b (Pengatur Muda Tk.1)',
        'II/c (Pengatur)'            => 'II/c (Pengatur)',
        'II/d (Pengatur Tk.1)'       => 'II/d (Pengatur Tk.1)',
        'III/a (Penata Muda)'        => 'III/a (Penata Muda)',
        'III/b (Penata Muda Tk.1)'   => 'III/b (Penata Muda Tk.1)',
        'III/c (Penata )'            => 'III/c (Penata )',
        'III/d (Penata Tk.1)'        => 'III/d (Penata Tk.1)',
        'IV/a (Pembina)'             => 'IV/a (Pembina)',
        'IV/b (Pembina Tk.1)'        => 'IV/b (Pembina Tk.1)',
        'IV/c (Pembina Utama Muda)'  => 'IV/c (Pembina Utama Muda)',
        'IV/d (Pembina Utama Madya)' => 'IV/d (Pembina Utama Madya)',
        'IV/d (Pembina Utama)'       => 'IV/d (Pembina Utama)',
    ];

    public $table = 'kepangkatans';

    protected $dates = [
        'tgl_skin',
        'tmtskin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'gol',
        'nomorsk',
        'tgl_skin',
        'tmtskin',
        'masa_kerja',
        'masa_bulan',
        'upload_sk',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodatum::class, 'biodata_id');
    }

    public function getTglSkinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglSkinAttribute($value)
    {
        $this->attributes['tgl_skin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTmtskinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTmtskinAttribute($value)
    {
        $this->attributes['tmtskin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}