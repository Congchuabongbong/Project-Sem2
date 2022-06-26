<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'id'=> 1,
                'name'=>'Mobile',
                'description'=>'A mobile phone, cellular phone, cell phone, cellphone, handphone, or hand phone, sometimes shortened to simply mobile, cell or just phone, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area. The radio frequency link establishes a connection to the switching systems of a mobile phone operator, which provides access to the public switched telephone network (PSTN).',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 2,
                'name'=>'Laptop',
                'description'=>'A laptop, laptop computer, or notebook computer is a small, portable personal computer (PC) with a screen and alphanumeric keyboard. These typically have a clam shell form factor, typically having the screen mounted on the inside of the upper lid and the keyboard on the inside of the lower lid, although 2-in-1 PCs with a detachable keyboard are often marketed as laptops or as having a laptop mode.',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 3,
                'name'=>'Accessory',
                'description'=>'accessories for computers and laptops',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            // [
            //     'id'=> 4,
            //     'name'=>'Backup Charger',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 5,
            //     'name'=>'Memory Card',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 6,
            //     'name'=>'Screen Protector',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 7,
            //     'name'=>'USB-Hard Drive',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 8,
            //     'name'=>'Charging Cable',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 9,
            //     'name'=>'Mouse',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 10,
            //     'name'=>'Keyboard',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 11,
            //     'name'=>'Laptop backpack',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 12,
            //     'name'=>'TV Box',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ],
            // [
            //     'id'=> 13,
            //     'name'=>'Router',
            //     'description'=>'accessories for computers and laptops',
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            // ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
