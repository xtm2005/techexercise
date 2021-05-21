<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyVersioningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_versionings', function (Blueprint $table) {
            $table->id();
            $table->integer('keyId');
            $table->string('value');
            $table->string('version');
            $table->timestamps();
            $table->index('version');
            $table->index('keyId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_versionings');
    }
}
