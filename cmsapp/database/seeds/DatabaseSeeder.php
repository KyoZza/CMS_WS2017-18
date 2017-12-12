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
        // $this->call(UsersTableSeeder::class);

         // Role comes before User seeder here.
       // $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
<<<<<<< HEAD
       // $this->call(UserTableSeeder::class);
=======
        $this->call(UserTableSeeder::class);s
>>>>>>> d76a1dda24c186ae4139c317b8830dc61746b40b

      // $this->call(PageTableSeeder::class);
//
        $this->call(NavItemTableSeeder::class); 

<<<<<<< HEAD
       //$this->call(ThemeTableSeeder::class);
       // $this->call(ThemeHeaderOptionsTableSeeder::class);
      //  $this->call(HeaderImageTableSeeder::class); 
        
       // $this->call(ThemeColorTableSeeder::class);
=======
        $this->call(NavItemTableSeeder::class); */

        /*$this->call(ThemeTableSeeder::class);
        $this->call(ThemeHeaderOptionsTableSeeder::class);
        $this->call(HeaderImageTableSeeder::class);
>>>>>>> d76a1dda24c186ae4139c317b8830dc61746b40b
        
        $this->call(ThemeColorTableSeeder::class);*/
        $this->call(FontsTableSeeder::class);
        //Uncomment the seeds you need!!
    }
}
