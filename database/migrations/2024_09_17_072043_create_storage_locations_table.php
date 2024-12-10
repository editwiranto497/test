<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('storage_locations', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('storage_locations');
    }

};
