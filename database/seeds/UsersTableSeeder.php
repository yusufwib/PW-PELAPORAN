<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class,100)->create();
        User::create([
        'name' => 'Admin Sarpra',
        'email' => 'sarpra@smktelkom.sch.id',
        'nis' => 0,
        'avatar' => 'http://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools.png',
        'password' => bcrypt('s4rpr40y1'), // secret
        'role' => 'admin'
    ]);
    }
}
