<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationFurnitureAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration_furniture_assignment', function (Blueprint $table) {
            $table->foreignId('furniture_id')->constrained()->cascadeOnDelete();
            $table->foreignId('configuration_id')->constrained('furniture_configurations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuration_furniture_assignment');
    }
}
