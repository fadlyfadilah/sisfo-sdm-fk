<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jafung extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const JAB_FUNG_SELECT = [
        'Asisten Ahli (100.00)'  => 'Asisten Ahli (100.00)',
        'Asisten Ahli (150.00)'  => 'Asisten Ahli (150.00)',
        'Lektor (200.00)'        => 'Lektor (200.00)',
        'Lektor (300.00)'        => 'Lektor (300.00)',
        'Lektor Kepala (400.00)' => 'Lektor Kepala (400.00)',
        'Lektor Kepala (550.00)' => 'Lektor Kepala (550.00)',
        'Lektor Kepala (700.00)' => 'Lektor Kepala (700.00)',
        'Profesor (850)'         => 'Profesor (850)',
        'Profesor (1050)'        => 'Profesor (1050)',
    ];

    public $table = 'jafungs';

    protected $dates = [
        'tmt_jab',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biodata_id',
        'jab_fung',
        'no_skjab',
        'tmt_jab',
        'leb_ajar',
        'leb_pen',
        'leb_pkm',
        'leb_penun',
        'file_jabfung',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodatum::class, 'biodata_id');
    }

    public function getTmtJabAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTmtJabAttribute($value)
    {
        $this->attributes['tmt_jab'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}