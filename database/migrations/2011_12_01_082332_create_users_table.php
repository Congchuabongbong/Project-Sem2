<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullName');
            $table->string('phone');
            $table->string('address');
            $table->string('avatar')->default('https://res.cloudinary.com/tanvnth2012002/image/upload/v1638316998/default-avatar-profile-icon-vector-social-media-user-portrait-176256935_mlifmc.jpg');
            $table->string('description')->nullable();
            $table->integer('role'); //1 admin, 0 customer
            $table->integer('status')->default(1); // (1 đang hoạt động, 0 tạm khóa)
            $table->date('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
