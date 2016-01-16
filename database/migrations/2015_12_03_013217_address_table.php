<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name',150);
            $table->string('street1',150);
            $table->string('street2',150);
            $table->string('city',150);
            $table->string('state',150);
            $table->string('contry',150);
            $table->float('lat');
            $table->string('lang');
            $table->integer('status');
            $table->integer('pincode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address', function (Blueprint $table) {
            //
            Schema::drop('address');
        });
    }
}
