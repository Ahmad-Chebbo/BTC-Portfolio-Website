<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_settings', function (Blueprint $table) {
            $table->id();
            // $table->string('portfolio')->nullable();
            // $table->string('p_sub')->nullable();
            // $table->boolean('p_en')->default(true);
            // $table->string('about')->nullable();
            // $table->string('a_sub')->nullable();
            // $table->boolean('a_en')->default(true);
            // $table->string('experience')->nullable();
            // $table->string('ex_sub')->nullable();
            // $table->boolean('ex_en')->default(true);
            // $table->string('education')->nullable();
            // $table->string('ed_sub')->nullable();
            // $table->boolean('ed_en')->default(true);
            // $table->string('counter')->nullable();
            // $table->boolean('c_en')->default(true);
            // $table->string('quote')->nullable();
            // $table->boolean('q_en')->default(true);

            $table->string('section')->nullable();
            $table->string('header')->nullable();
            $table->text('subtitle')->nullable();
            $table->boolean('enabled')->default(true);

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
        Schema::dropIfExists('section_settings');
    }
}
