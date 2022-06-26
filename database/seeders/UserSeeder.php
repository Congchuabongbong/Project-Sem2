<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id'=> 1,
                'email'=>'guest@gmail.com',
                'password'=>bcrypt('guest@gmail.com'),
                'fullName'=>'Khach Vang Lai',
                'phone'=>'0918466600',
                'address'=>'Viet Nam',
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638888511/Wikilogo_muns3z.png',
                'role'=>0,
                'description'=>'Khach Vang Lai',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 2,
                'email'=>'quynv@fpt.com',
                'password'=>bcrypt('123123123'),
                'fullName'=>'Nguyen Van Quy',
                'phone'=>'0918466600',
                'address'=>'136 Ho Tung Mau, Ha Noi',
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>1,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 3,
                'email'=>'springhero@gmail.com',
                'password'=>bcrypt('123123123'),
                'fullName'=>'Spring Very Hero',
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>1,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 4,
                'email'=>'customer@gmail.com',
                'password'=>bcrypt('123123123'),
                'fullName'=>'Chu Dieu Linh',
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 5,
                'email'=>$faker->email,
                'password'=>'$2y$10$QEbJvoH8w79vnSMQsyRXNuynBtxuHsUVXLyEdR3Zeg10YTvy07cuK',
                'fullName'=>$faker->firstName,
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 6,
                'email'=>$faker->email,
                'password'=>'$2y$10$QEbJvoH8w79vnSMQsyRXNuynBtxuHsUVXLyEdR3Zeg10YTvy07cuK',
                'fullName'=>$faker->firstName,
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 7,
                'email'=>$faker->email,
                'password'=>'$2y$10$QEbJvoH8w79vnSMQsyRXNuynBtxuHsUVXLyEdR3Zeg10YTvy07cuK',
                'fullName'=>$faker->firstName,
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 8,
                'email'=>$faker->email,
                'password'=>'$2y$10$QEbJvoH8w79vnSMQsyRXNuynBtxuHsUVXLyEdR3Zeg10YTvy07cuK',
                'fullName'=>$faker->firstName,
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 9,
                'email'=>$faker->email,
                'password'=>'$2y$10$QEbJvoH8w79vnSMQsyRXNuynBtxuHsUVXLyEdR3Zeg10YTvy07cuK',
                'fullName'=>$faker->firstName,
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'id'=> 10,
                'email'=>$faker->email,
                'password'=>'$2y$10$QEbJvoH8w79vnSMQsyRXNuynBtxuHsUVXLyEdR3Zeg10YTvy07cuK',
                'fullName'=>$faker->firstName,
                'phone'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'avatar'=>'https://res.cloudinary.com/quynv300192/image/upload/v1638689217/chom-nghe-danh-hot-girl-15-tuoi-linh-ka-bat-ngo-bi-doa-kien_mcrwav.jpg',
                'role'=>0,
                'description'=>'Doc lap tu do hanh phuc',
                'status'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],[
            'id'=> 11,
            'email'=>'kiennx@fpt.edu.vn',
            'password'=>bcrypt('111'),
            'fullName'=>'Nguyễn Xuân Kiên',
            'phone'=>'0346578094',
            'address'=>'Lai Xá, Kim Chung, Hoài Đức, Hà Nội',
            'avatar'=>'https://res.cloudinary.com/kiennx1009/image/upload/v1639063503/wonder-woman-movie-150x150_svw1xt.jpg',
            'role'=>1,
            'description'=>'Hello world',
            'status'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
