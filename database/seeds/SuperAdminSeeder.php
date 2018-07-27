<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'id' => 0,
	        'username'	=> 'superadmin',
	        'email'	=> 'ariaelhamidy@gmail.com',
	        'password'	=> bcrypt('elhamidy97'),
	        'role' => 99,
	        'status' => 1,
	        'token' => 'aMuMCxH2L9ugZk7alaRB',
	        'str_slug' => 'superadmin'
		]);

		 \App\Facilitator::create([
	        'nama_instansi'	=> 'admin',
	        'deskripsi_instansi'	=> 'admin',
	        'kategori'	=> 1,
	        'user_id' => 0,
	        'token_facilitator' => 'AYeqUeyMmNdU57CyThjk',
	        'status' => 1,
	        'str_slug' => 'admin',
		]);
    }
}
