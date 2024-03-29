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
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('code')->nullable();
            $table->string('avatar')->default('default.png');
            $table->integer('active')->default(0);
            $table->integer('role')->default('0');
            $table->string('device_id',500)->nullable();
            $table->string('device_type')->nullable();
            $table->integer('confirm')->default('0');
            $table->float("lat")->nullable();
            $table->float("lng")->nullable();
            $table->string("address")->nullable();
            $table->string('lang')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });

         // Insert some stuff
        $user = new User;
        $user->name ='اوامر الشبكه';
        $user->email ='aait@info.com';
        $user->password =bcrypt(111111);
        $user->phone ='123456789';
        $user->avatar ='default.png';
//        $user->arrears ='100';
        $user->active ='1';
        $user->role ='1';
        $user->device_id ='1111111111';
        $user->save();


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
