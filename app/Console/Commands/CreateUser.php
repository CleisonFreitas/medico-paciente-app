<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {name?} {email?} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Provide a new user to test all the apis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = Factory::create();
        $name = $this->argument('name') ?? $faker->name;
        $email = $this->argument('email') ?? $faker->email;
        $password = $this->argument('password') ?? $faker->password;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $this->info("success! the new user $email and password $password has been created!");
    }
}
