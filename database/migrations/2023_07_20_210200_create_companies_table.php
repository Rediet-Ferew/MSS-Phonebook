<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('phone');
            $table->foreignId('cat_id')->constrained('categories');
            $table->string('location');
            $table->string('branch');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('subcity_id')->constrained('subcities');
            $table->foreignId('woreda_id')->constrained('woredas');
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
        Schema::dropIfExists('companies');
    }
}
