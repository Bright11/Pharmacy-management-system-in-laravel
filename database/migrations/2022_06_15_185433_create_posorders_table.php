<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posorders', function (Blueprint $table) {
            $table->id();
            $table->string('drug_id');
            $table->string('name');
            $table->integer('price');
            $table->string('expiring_date');
            $table->string('manufacturing_date');
            $table->string('image');
            $table->integer('branch_id');
            $table->integer('user_id');
            $table->integer('qty');
            $table->integer('totalprice');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('posorders');
    }
}
