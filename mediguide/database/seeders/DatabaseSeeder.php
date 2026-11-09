<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'mediguideai999@gmail.com'], [
            'name'=>'MediGuide Admin','role'=>'admin','password'=>'Admin@12345','email_verified_at'=>now(),
        ]);
    }
}
