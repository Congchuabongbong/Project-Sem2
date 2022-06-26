<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Order_details');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('order_details')->truncate();
        DB::table('order_details')->insert([
            [
            'orderID' => 1,
            'mobileID' => 1,
            'quantity' => 1,
            'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
            'discount' => $faker->numberBetween(1, 3) * 0.1,
            'created_at' => Carbon::now()->addMonth(-3),
            'updated_at' => Carbon::now()->addMonth(-3)
        ],[
                'orderID' => 1,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addMonth(-3),
                'updated_at' => Carbon::now()->addMonth(-3)
            ],[
                'orderID' => 2,
                'mobileID' => 3,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-84),
                'updated_at' => Carbon::now()->addDay(-84),
            ],[
                'orderID' => 2,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-81),
                'updated_at' => Carbon::now()->addDay(-81)
            ],[
                'orderID' => 3,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-81),
                'updated_at' => Carbon::now()->addDay(-81)
            ],[
                'orderID' => 3,
                'mobileID' => $faker->numberBetween(1, 26),
                'quantity' => 2,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-78),
                'updated_at' => Carbon::now()->addDay(-78)
            ],[
                'orderID' => 4,
                'mobileID' => 10,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-78),
                'updated_at' => Carbon::now()->addDay(-78)
            ],[
                'orderID' => 4,
                'mobileID' => 11,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-75),
                'updated_at' => Carbon::now()->addDay(-75)
            ],[
                'orderID' => 5,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-75),
                'updated_at' => Carbon::now()->addDay(-75)
            ],[
                'orderID' => 5,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-72),
                'updated_at' => Carbon::now()->addDay(-72)
            ],[
                'orderID' => 6,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-72),
                'updated_at' => Carbon::now()->addDay(-72)
            ],[
                'orderID' => 6,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-69),
                'updated_at' => Carbon::now()->addDay(-69)
            ],[
                'orderID' => 7,
                'mobileID' => 9,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-69),
                'updated_at' => Carbon::now()->addDay(-69)
            ],[
                'orderID' => 7,
                'mobileID' => 10,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-66),
                'updated_at' => Carbon::now()->addDay(-66)
            ],[
                'orderID' => 8,
                'mobileID' => 11,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-66),
                'updated_at' => Carbon::now()->addDay(-66)
            ],[
                'orderID' => 8,
                'mobileID' => 12,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-63),
                'updated_at' => Carbon::now()->addDay(-63)
            ],[
                'orderID' => 9,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-63),
                'updated_at' => Carbon::now()->addDay(-63)
            ],[
                'orderID' => 9,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 10,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 10,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-54),
                'updated_at' => Carbon::now()->addDay(-54)
            ],[
                'orderID' => 11,
                'mobileID' => 6,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-51),
                'updated_at' => Carbon::now()->addDay(-51)
            ],[
                'orderID' => 11,
                'mobileID' => 3,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-48),
                'updated_at' => Carbon::now()->addDay(-48)
            ],[
                'orderID' => 12,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-45),
                'updated_at' => Carbon::now()->addDay(-45)
            ],[
                'orderID' => 12,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-42),
                'updated_at' => Carbon::now()->addDay(-42)
            ],[
                'orderID' => 13,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-39),
                'updated_at' => Carbon::now()->addDay(-39)
            ],[
                'orderID' => 13,
                'mobileID' => 6,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-36),
                'updated_at' => Carbon::now()->addDay(-36)
            ],[
                'orderID' => 14,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-33),
                'updated_at' => Carbon::now()->addDay(-33)
            ],[
                'orderID' => 14,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-30),
                'updated_at' => Carbon::now()->addDay(-30)
            ],[
                'orderID' => 15,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-27),
                'updated_at' => Carbon::now()->addDay(-27)
            ],[
                'orderID' => 15,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-24),
                'updated_at' => Carbon::now()->addDay(-24)
            ],[
                'orderID' => 16,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-21),
                'updated_at' => Carbon::now()->addDay(-21)
            ],[
                'orderID' => 16,
                'mobileID' => 3,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-18),
                'updated_at' => Carbon::now()->addDay(-18)
            ],[
                'orderID' => 17,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-15),
                'updated_at' => Carbon::now()->addDay(-15)
            ],[
                'orderID' => 17,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-12),
                'updated_at' => Carbon::now()->addDay(-12)
            ],[
                'orderID' => 18,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-9),
                'updated_at' => Carbon::now()->addDay(-9)
            ],[
                'orderID' => 18,
                'mobileID' => 6,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-6),
                'updated_at' => Carbon::now()->addDay(-6)
            ],[
                'orderID' => 19,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-3),
                'updated_at' => Carbon::now()->addDay(-3)
            ],[
                'orderID' => 19,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'orderID' => 20,
                'mobileID' => 9,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(3),
                'updated_at' => Carbon::now()->addDay(3)
            ],[
                'orderID' => 20,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(6),
                'updated_at' => Carbon::now()->addDay(6)
            ],[
                'orderID' => 21,
                'mobileID' => 3,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(9),
                'updated_at' => Carbon::now()->addDay(9)
            ],[
                'orderID' => 21,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(12),
                'updated_at' => Carbon::now()->addDay(12)
            ],[
                'orderID' => 22,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(15),
                'updated_at' => Carbon::now()->addDay(15)
            ],[
                'orderID' => 22,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(18),
                'updated_at' => Carbon::now()->addDay(187)
            ],[
                'orderID' => 23,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(21),
                'updated_at' => Carbon::now()->addDay(21)
            ],[
                'orderID' => 23,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(24),
                'updated_at' => Carbon::now()->addDay(24)
            ],[
                'orderID' => 24,
                'mobileID' => 6,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(27),
                'updated_at' => Carbon::now()->addDay(27)
            ],[
                'orderID' => 24,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(30),
                'updated_at' => Carbon::now()->addDay(30)
            ],[
                'orderID' => 25,
                'mobileID' => 6,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(33),
                'updated_at' => Carbon::now()->addDay(33)
            ],[
                'orderID' => 25,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(36),
                'updated_at' => Carbon::now()->addDay(36)
            ],[
                'orderID' => 26,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(39),
                'updated_at' => Carbon::now()->addDay(39)
            ],[
                'orderID' => 27,
                'mobileID' => 7,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(42),
                'updated_at' => Carbon::now()->addDay(42)
            ],[
                'orderID' => 28,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(45),
                'updated_at' => Carbon::now()->addDay(45)
            ],[
                'orderID' => 28,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(48),
                'updated_at' => Carbon::now()->addDay(48)
            ],[
                'orderID' => 29,
                'mobileID' => 9,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(51),
                'updated_at' => Carbon::now()->addDay(51)
            ],[
                'orderID' => 29,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(54),
                'updated_at' => Carbon::now()->addDay(54)
            ],[
                'orderID' => 30,
                'mobileID' => 10,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(57),
                'updated_at' => Carbon::now()->addDay(57)
            ],[
                'orderID' => 30,
                'mobileID' => 12,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(60),
                'updated_at' => Carbon::now()->addDay(60)
            ],[
                'orderID' => 31,
                'mobileID' => 11,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(63),
                'updated_at' => Carbon::now()->addDay(63)
            ],[
                'orderID' => 31,
                'mobileID' => 15,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(66),
                'updated_at' => Carbon::now()->addDay(66)
            ],[
                'orderID' => 32,
                'mobileID' => 16,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(69),
                'updated_at' => Carbon::now()->addDay(69)
            ],[
                'orderID' => 32,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(72),
                'updated_at' => Carbon::now()->addDay(72)
            ],[
                'orderID' => 33,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(75),
                'updated_at' => Carbon::now()->addDay(75)
            ],[
                'orderID' => 33,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(78),
                'updated_at' => Carbon::now()->addDay(78)
            ],[
                'orderID' => 34,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(81),
                'updated_at' => Carbon::now()->addDay(81)
            ],[
                'orderID' => 34,
                'mobileID' => 12,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(84),
                'updated_at' => Carbon::now()->addDay(84)
            ],[
                'orderID' => 35,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 35,
                'mobileID' => 14,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 36,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 36,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 37,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 37,
                'mobileID' => 8,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 38,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 38,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 39,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 39,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 40,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 40,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 41,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 41,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 42,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 42,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 43,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 43,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 44,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 44,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 45,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 45,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 46,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 46,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 47,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 47,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 48,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 48,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 49,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 49,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 50,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 50,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 51,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 51,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 52,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 52,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 53,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 53,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 54,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 54,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 55,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 55,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 56,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 56,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 57,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 57,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 58,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 58,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 60,
                'mobileID' => 1,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-60),
                'updated_at' => Carbon::now()->addDay(-60)
            ],[
                'orderID' => 60,
                'mobileID' => 2,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 60,
                'mobileID' => 3,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 60,
                'mobileID' => 4,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 60,
                'mobileID' => 5,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ],[
                'orderID' => 60,
                'mobileID' => 6,
                'quantity' => 1,
                'unitPrice' => $faker->numberBetween(1, 10) * 5000000,
                'discount' => $faker->numberBetween(1, 3) * 0.1,
                'created_at' => Carbon::now()->addDay(-57),
                'updated_at' => Carbon::now()->addDay(-57)
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
