<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'profil_access',
            ],
            [
                'id'    => 18,
                'title' => 'biodatum_create',
            ],
            [
                'id'    => 19,
                'title' => 'biodatum_edit',
            ],
            [
                'id'    => 20,
                'title' => 'biodatum_show',
            ],
            [
                'id'    => 21,
                'title' => 'biodatum_delete',
            ],
            [
                'id'    => 22,
                'title' => 'biodatum_access',
            ],
            [
                'id'    => 23,
                'title' => 'impasing_create',
            ],
            [
                'id'    => 24,
                'title' => 'impasing_edit',
            ],
            [
                'id'    => 25,
                'title' => 'impasing_show',
            ],
            [
                'id'    => 26,
                'title' => 'impasing_delete',
            ],
            [
                'id'    => 27,
                'title' => 'impasing_access',
            ],
            [
                'id'    => 28,
                'title' => 'jafung_create',
            ],
            [
                'id'    => 29,
                'title' => 'jafung_edit',
            ],
            [
                'id'    => 30,
                'title' => 'jafung_show',
            ],
            [
                'id'    => 31,
                'title' => 'jafung_delete',
            ],
            [
                'id'    => 32,
                'title' => 'jafung_access',
            ],
            [
                'id'    => 33,
                'title' => 'kepangkatan_create',
            ],
            [
                'id'    => 34,
                'title' => 'kepangkatan_edit',
            ],
            [
                'id'    => 35,
                'title' => 'kepangkatan_show',
            ],
            [
                'id'    => 36,
                'title' => 'kepangkatan_delete',
            ],
            [
                'id'    => 37,
                'title' => 'kepangkatan_access',
            ],
            [
                'id'    => 38,
                'title' => 'kualifikasi_access',
            ],
            [
                'id'    => 39,
                'title' => 'pendidikan_create',
            ],
            [
                'id'    => 40,
                'title' => 'pendidikan_edit',
            ],
            [
                'id'    => 41,
                'title' => 'pendidikan_show',
            ],
            [
                'id'    => 42,
                'title' => 'pendidikan_delete',
            ],
            [
                'id'    => 43,
                'title' => 'pendidikan_access',
            ],
            [
                'id'    => 44,
                'title' => 'diklat_create',
            ],
            [
                'id'    => 45,
                'title' => 'diklat_edit',
            ],
            [
                'id'    => 46,
                'title' => 'diklat_show',
            ],
            [
                'id'    => 47,
                'title' => 'diklat_delete',
            ],
            [
                'id'    => 48,
                'title' => 'diklat_access',
            ],
            [
                'id'    => 49,
                'title' => 'kompetensi_access',
            ],
            [
                'id'    => 50,
                'title' => 'sertifikasi_create',
            ],
            [
                'id'    => 51,
                'title' => 'sertifikasi_edit',
            ],
            [
                'id'    => 52,
                'title' => 'sertifikasi_show',
            ],
            [
                'id'    => 53,
                'title' => 'sertifikasi_delete',
            ],
            [
                'id'    => 54,
                'title' => 'sertifikasi_access',
            ],
            [
                'id'    => 55,
                'title' => 'sertifikasiprof_create',
            ],
            [
                'id'    => 56,
                'title' => 'sertifikasiprof_edit',
            ],
            [
                'id'    => 57,
                'title' => 'sertifikasiprof_show',
            ],
            [
                'id'    => 58,
                'title' => 'sertifikasiprof_delete',
            ],
            [
                'id'    => 59,
                'title' => 'sertifikasiprof_access',
            ],
            [
                'id'    => 60,
                'title' => 'studi_create',
            ],
            [
                'id'    => 61,
                'title' => 'studi_edit',
            ],
            [
                'id'    => 62,
                'title' => 'studi_show',
            ],
            [
                'id'    => 63,
                'title' => 'studi_delete',
            ],
            [
                'id'    => 64,
                'title' => 'studi_access',
            ],
            [
                'id'    => 65,
                'title' => 'rekognisi_create',
            ],
            [
                'id'    => 66,
                'title' => 'rekognisi_edit',
            ],
            [
                'id'    => 67,
                'title' => 'rekognisi_show',
            ],
            [
                'id'    => 68,
                'title' => 'rekognisi_delete',
            ],
            [
                'id'    => 69,
                'title' => 'rekognisi_access',
            ],
            [
                'id'    => 70,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
