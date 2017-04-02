<?php
/**
 * Created by PhpStorm.
 * User: Phantom
 * Date: 3/26/2017
 * Time: 9:34 PM
 */
class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Hoàng Super',
            'username' => 'admin',
            'email'    => 'hoangtd@admin.com',
            'password' => Hash::make('123456'),
        ));
    }

}