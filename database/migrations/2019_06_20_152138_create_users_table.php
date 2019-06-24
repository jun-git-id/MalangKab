<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password');
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        User::insert([
            [
                'username' => 'superadmin',
                'email'    => 'superadmin@malangkab.go.id',
                'password' => bcrypt('admin123'),
                'role_id'  => 1,
                'created_at' => \Carbon\Carbon::now()
            ],

            [
                'username' => 'admin',
                'email'    => 'admin@malangkab.go.id',
                'password' => bcrypt('admin123'),
                'role_id'  => 2,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'username' => 'rizky',
                'email'    => 'rizkyrhakiki21@gmail.com',
                'password' => bcrypt('admin123'),
                'role_id'  => 3,
                'created_at' => \Carbon\Carbon::now()
            ]
        ]);
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
