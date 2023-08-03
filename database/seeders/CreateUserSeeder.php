<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Criando usuários fakers */
        User::factory()->count(10)->create();

        /* Usuário teste */
        $users = [];
        if(!User::where('email', 'admin@example.com.br')->first()){
            $admin = [
                "name" => "admin",
                "email" => "admin@admin.com.br",
                "email_verified_at" => NULL,
                "password" => Hash::make("password"),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
                "deleted_at" => NULL,
            ];
            $users[] = $admin;
        }

        DB::table("users")->insert($users);
    }
}
