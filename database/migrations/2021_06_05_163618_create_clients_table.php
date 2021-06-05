<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->foreignId('city_id');
            $table->timestamps();
        });
        Schema::table('clients', function($table){
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function($table)
        {
            $table->dropForeign(['client_city_id_foreign']);
        });
            Schema::dropIfExists('clients');
    }
}
