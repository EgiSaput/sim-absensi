<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin MA Az-Zahra',
            'nip' => 'ADM001',
            'email' => 'admin@mazahra.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'phone' => '081200000001',
        ]);

        $teachers = [
            ['name' => 'Ust. Ahmad Fauzi, S.Pd', 'nip' => 'G001', 'email' => 'ahmad.fauzi@mazahra.sch.id'],
            ['name' => 'Ustzh. Siti Nurhaliza, S.Pd', 'nip' => 'G002', 'email' => 'siti.nurhaliza@mazahra.sch.id'],
            ['name' => 'Bpk. Dedi Kurniawan, S.Kom', 'nip' => 'G003', 'email' => 'dedi.kurniawan@mazahra.sch.id'],
        ];

        foreach ($teachers as $teacher) {
            User::create([
                ...$teacher,
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'phone' => '0812'.rand(10000000, 99999999),
            ]);
        }
    }
}
