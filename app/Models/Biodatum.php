<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biodatum extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const JK_SELECT = [
        'Laki-Laki' => 'Laki-Laki',
        'Perempuan' => 'Perempuan',
    ];

    public const HOMEBASE_SELECT = [
        'Akamdeik' => 'Akademik',
        'Profesi'  => 'Profesi',
    ];

    public const STATUSKEP_SELECT = [
        'Dosen Tetap'       => 'Dosen Tetap',
        'Dosen Tidak Tetap' => 'Dosen Tidak Tetap',
    ];

    public $table = 'biodata';

    protected $dates = [
        'tgl',
        'pns_suami_istri',
        'ttg_sk_yayasan',
        'tgl_sktmt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nik_id',
        'image',
        'nidn',
        'nidn_file',
        'jk',
        'tl',
        'tgl',
        'noktp',
        'filektp',
        'agama',
        'kewarnegaraan',
        'status_nikah',
        'suami_istri',
        'nipsuami_istri',
        'pekerjaan_suami_istri',
        'pns_suami_istri',
        'bidangke_1',
        'bidangke_2',
        'homebase',
        'email',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'desa',
        'kota',
        'provinsi',
        'kodepos',
        'telp_rumah',
        'no_hp',
        'prodi',
        'nip_pns',
        'statuskep',
        'institusi',
        'bagian',
        'status_aktif',
        'noskyayasan',
        'ttg_sk_yayasan',
        'sk_yayasandoc',
        'nomor_sktmt',
        'tgl_sktmt',
        'sumber_gaji',
        'npwp',
        'pajak',
        'jabatan',
        'matkul',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function biodataImpasings()
    {
        return $this->hasMany(Impasing::class, 'biodata_id', 'id');
    }

    public function biodataJafungs()
    {
        return $this->hasMany(Jafung::class, 'biodata_id', 'id');
    }

    public function biodataKepangkatans()
    {
        return $this->hasMany(Kepangkatan::class, 'biodata_id', 'id');
    }

    public function biodataPendidikans()
    {
        return $this->hasMany(Pendidikan::class, 'biodata_id', 'id');
    }

    public function biodataDiklats()
    {
        return $this->hasMany(Diklat::class, 'biodata_id', 'id');
    }

    public function biodataSertifikasis()
    {
        return $this->hasMany(Sertifikasi::class, 'biodata_id', 'id');
    }

    public function biodataSertifikasiprofs()
    {
        return $this->hasMany(Sertifikasiprof::class, 'biodata_id', 'id');
    }

    public function biodataStudis()
    {
        return $this->hasMany(Studi::class, 'biodata_id', 'id');
    }

    public function biodataRekognisis()
    {
        return $this->hasMany(Rekognisi::class, 'biodata_id', 'id');
    }

    public function nik()
    {
        return $this->belongsTo(User::class, 'nik_id');
    }

    public function getTglAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglAttribute($value)
    {
        $this->attributes['tgl'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPnsSuamiIstriAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPnsSuamiIstriAttribute($value)
    {
        $this->attributes['pns_suami_istri'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTtgSkYayasanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTtgSkYayasanAttribute($value)
    {
        $this->attributes['ttg_sk_yayasan'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTglSktmtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglSktmtAttribute($value)
    {
        $this->attributes['tgl_sktmt'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}