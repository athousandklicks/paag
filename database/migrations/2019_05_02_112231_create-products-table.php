<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('product_name');
            $table->string('sku')->nullable();
            $table->string('artist');
            $table->float('amount', 10, 4);
            $table->longText('brief_description');
            $table->longText('full_description');
            $table->text('dimension_description');
            $table->string('type');
            $table->string('support_type');
            $table->string('height');
            $table->string('width');
            $table->string('depth');
            $table->string('weight');
            $table->string('year_created');
            $table->tinyInteger('hangable')->default(0)->nullable();
            $table->tinyInteger('frame')->default(0)->nullable();
            $table->tinyInteger('sign')->default(0)->nullable();
            $table->string('signature_location')->nullable();
            $table->string('callback_url')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->string('image_fullview')->nullable();
            $table->string('image_leftside')->nullable();
            $table->string('image_rightside')->nullable();
            $table->string('image_back')->nullable();
            $table->string('image_hanged')->nullable();
            $table->string('image_gallery')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('products');
    }
}
