<?php

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
        $users = factory(\App\Models\User::class)->times(50)->make();
        \App\Models\User::insert($users->toArray());

        $user = \App\Models\User::findOrFail(1);
        $user->email = 'admin@rtbs.cn';
        $user->password = bcrypt('111111');
        $user->save();
    }
}
