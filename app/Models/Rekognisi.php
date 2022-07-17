<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekognisi extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TINGKAT_REG_SELECT = [
        'Wilayah'       => 'Wilayah',
        'Nasional'      => 'Nasional',
        'Internasional' => 'Internasional',
    ];

    public const JENIS_REKO_SELECT = [
        'Visiting Lecturer' => 'Visiting Lecturer',
        'Staff Ahli'        => 'Staff Ahli',
        'Keynote Speaker'   => 'Keynote Speaker',
        'Penghargaan'       => 'Penghargaan',
    ];

    public const AKADEMIK_SELECT = [
        '2021/2022 Ganjil' => '2021/2022 Ganjil',
        '2021/2022 Genap'  => '2021/2022 Genap',
        '2022/2023 Ganjil' => '2022/2023 Ganjil',
        '2022/2023 Genap'  => '2022/2023 Genap',
        '2023/2024 Ganjil' => '2023/2024 Ganjil',
        '2023/2024 Genap'  => '2023/2024 Genap',
    ];

    public $table = 'rekognisis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'bidangahli',
        'rekognisi',
        'tingkat_reg',
        'jenis_reko',
        'akademik',
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