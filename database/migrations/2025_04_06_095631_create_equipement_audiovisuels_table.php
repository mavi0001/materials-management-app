<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipementAudiovisuelsTable extends Migration
{
    public function up()
    {
        Schema::create('equipement_audiovisuels', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('inventory_number')->unique();
            $table->integer('quantity');
            $table->string('material_reference')->nullable();
            $table->boolean('available')->default(true);
            $table->boolean('on_loan')->default(false);
            $table->boolean('under_maintenance')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipement_audiovisuels');
    }
}
