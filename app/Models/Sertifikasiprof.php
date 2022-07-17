<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sertifikasiprof extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sertifikasiprofs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'bidang_studi',
        'no_re',
        'no_sk',
        'tahun_serti',
        'file_serti',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodatum::class, 'biodata_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}