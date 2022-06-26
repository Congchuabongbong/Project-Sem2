<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Feedback');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('feedback')->truncate();
        DB::table('feedback')->insert([
            [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addMonth(-3),
                'updated_at' => Carbon::now()->addMonth(-3)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addMonth(-2),
                'updated_at' => Carbon::now()->addMonth(-2)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-55),
                'updated_at' => Carbon::now()->addDay(-55)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-50),
                'updated_at' => Carbon::now()->addDay(-50)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-45),
                'updated_at' => Carbon::now()->addDay(-45)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-40),
                'updated_at' => Carbon::now()->addDay(-40)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-35),
                'updated_at' => Carbon::now()->addDay(-35)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-30),
                'updated_at' => Carbon::now()->addDay(-30)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-30),
                'updated_at' => Carbon::now()->addDay(-30)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-25),
                'updated_at' => Carbon::now()->addDay(-25)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-25),
                'updated_at' => Carbon::now()->addDay(-25)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-15),
                'updated_at' => Carbon::now()->addDay(-15)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-15),
                'updated_at' => Carbon::now()->addDay(-15)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-10),
                'updated_at' => Carbon::now()->addDay(-10)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-10),
                'updated_at' => Carbon::now()->addDay(-10)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-9),
                'updated_at' => Carbon::now()->addDay(-9)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-9),
                'updated_at' => Carbon::now()->addDay(-9)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-8),
                'updated_at' => Carbon::now()->addDay(-8)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-8),
                'updated_at' => Carbon::now()->addDay(-8)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-7),
                'updated_at' => Carbon::now()->addDay(-7)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-7),
                'updated_at' => Carbon::now()->addDay(-7)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-6),
                'updated_at' => Carbon::now()->addDay(-6)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-6),
                'updated_at' => Carbon::now()->addDay(-6)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-6),
                'updated_at' => Carbon::now()->addDay(-6)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-6),
                'updated_at' => Carbon::now()->addDay(-6)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-5),
                'updated_at' => Carbon::now()->addDay(-5)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-5),
                'updated_at' => Carbon::now()->addDay(-5)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-4),
                'updated_at' => Carbon::now()->addDay(-4)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-4),
                'updated_at' => Carbon::now()->addDay(-4)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-4),
                'updated_at' => Carbon::now()->addDay(-4)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-3),
                'updated_at' => Carbon::now()->addDay(-3)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-3),
                'updated_at' => Carbon::now()->addDay(-3)
            ], [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'comment' => $faker->sentence,
                'created_at' => Carbon::now()->addDay(-2),
                'updated_at' => Carbon::now()->addDay(-2)
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
