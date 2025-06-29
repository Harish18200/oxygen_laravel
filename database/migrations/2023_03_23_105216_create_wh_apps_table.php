<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wh_apps', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('line1'); 
            $table->string('line2');
            $table->string('ph_no');
            $table->string('image');            
            $table->string('status');
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
        Schema::dropIfExists('wh_apps');
    }
};
