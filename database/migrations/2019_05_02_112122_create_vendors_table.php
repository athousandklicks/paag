<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('flag')->nullable();
            $table->string('avatar')->nullable();
            $table->longText('bio')->nullable();
            $table->string('dob')->nullable();
            $table->longText('education')->nullable();
            $table->longText('awards')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('exhibitions')->nullable();
            $table->longText('mentors')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('vendors');
    }
}
