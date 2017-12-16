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
         // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);

      // $this->call(PageTableSeeder::class);
//
        //$this->call(NavItemTableSeeder::class); 

       //$this->call(ThemeTableSeeder::class);
       // $this->call(ThemeHeaderOptionsTableSeeder::class);
      //  $this->call(HeaderImageTableSeeder::class); 
        

        
        $this->call(ThemeColorTableSeeder::class);*/
        //$this->call(FontsTableSeeder::class);

        $this->call(GeneralOptionsSeeder::class);
        

        //Uncomment the seeds you need!!
    }
}
