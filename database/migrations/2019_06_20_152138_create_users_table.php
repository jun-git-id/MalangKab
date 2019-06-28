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
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('no_telp')->nullable();
            $table->longText('alamat')->nullable();
            $table->enum('gender', [1,2])->nullable()->comment('1. Laki-laki, 2. Perempuan');
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        User::insert([
            [
                'username' => 'superadmin',
                'nama' => 'superadmin',
                'nik' => 111,
                'email'    => 'superadmin@malangkab.go.id',
                'password' => bcrypt('admin123'),
                'role_id'  => 1,
                'created_at' => \Carbon\Carbon::now()
            ],

            [
                'username' => 'admin',
                'nama' => 'admin',
                'nik' => 222,
                'email'    => 'admin@malangkab.go.id',
                'password' => bcrypt('admin123'),
                'role_id'  => 2,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'username' => 'rizky',
                'nama' => 'rizky rahmat hakiki',
                'nik' => 333,
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
