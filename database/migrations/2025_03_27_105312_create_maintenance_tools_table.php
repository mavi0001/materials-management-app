<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('maintenance_tools', function (Blueprint $table) {
        $table->id();
        $table->string('designation');
        $table->string('inventory_number')->unique();
        $table->integer('quantity')->default(1);
        $table->string('material_reference')->nullable();
        $table->boolean('in_stock')->default(true);
        $table->boolean('on_loan')->default(false);
        $table->boolean('under_reform')->default(false);
        $table->timestamps();
    });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_tools');
    }
};
