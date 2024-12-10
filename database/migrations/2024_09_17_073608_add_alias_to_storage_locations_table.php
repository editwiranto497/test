<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAliasToStorageLocationsTable extends Migration
{
    public function up()
    {
        Schema::table('storage_locations', function (Blueprint $table) {
            $table->string('alias')->unique()->after('path');
        });
    }

    public function down()
    {
        Schema::table('storage_locations', function (Blueprint $table) {
            $table->dropColumn('alias');
        });
    }
}
