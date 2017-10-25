<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role 		= 	array(
		    array(
		    	'role_name'		=> 	'super admin'
		    ),
		    array(
		    	'role_name'		=> 	'admin'
		    ),
		    array(
		    	'role_name'		=> 	'operator'
		    ),
		);
		$course 	= 	array(
		    'course_name' 		=> 	'center',
		);
		$user		=	array(

			array(
				'username' 		=> 	'superadmin',
				'email'			=>	'superadmin@gmail.com',
				'password'		=>	bcrypt('superadmin'),
				'created_at'	=>	date('Y-m-d H:i:s'),
				'role_id'		=>	1,
				'course_id'		=>	1,

			),
			array(
				'username' 		=> 	'admin1',
				'email'			=>	'admin1@gmail.com',
				'password'		=>	bcrypt('admin1'),
				'created_at'	=>	date('Y-m-d H:i:s'),
				'role_id'		=>	2,
				'course_id'		=>	1,

			),
			array(
				'username' 		=> 	'admin2',
				'email'			=>	'admin2@gmail.com',
				'password'		=>	bcrypt('admin2'),
				'created_at'	=>	date('Y-m-d H:i:s'),
				'role_id'		=>	2,
				'course_id'		=>	1,

			),
			array(
				'username' 		=> 	'admin3',
				'email'			=>	'admin3@gmail.com',
				'password'		=>	bcrypt('admin3'),
				'created_at'	=>	date('Y-m-d H:i:s'),
				'role_id'		=>	2,
				'course_id'		=>	1,

			),

		);

		\App\Role::insert($role);
		\App\Course::insert($course);
		\App\User::insert($user);
    }
}
