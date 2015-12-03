<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakingObserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FloraObserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ObserverNameF', 45)->nullable();
            $table->string('ObserverNameL', 45)->nullable();
            $table->boolean('in_field');
            $table->string('PlantName', 100);
            $table->string('PlantLocation', 144)->nullable();
            $table->decimal('ObservationLat', 10, 6)->nullable();
            $table->decimal('ObservationLng', 10, 6)->nullable();
            $table->timestamps();
            $table->string('WeatherConditions', 144)->nullable();
            $table->float('Temp')->nullable();
            $table->integer('SoilType')->unsigned();
            $table->text('Notes')->nullable();
            $table->timestamp('observed_at');

            $table->foreign('SoilType')
                ->references('id')
                ->on('SoilTypes');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('FloraObserves');
    }
}
