<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('subscriptions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Relaciona con la tabla de usuarios
        $table->string('type'); // Tipo de suscripción: 1 mes, 3 meses, 1 año
        $table->date('start_date'); // Fecha de inicio
        $table->date('end_date'); // Fecha de fin
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('mentoria_id');
            $table->integer('duracion');
            $table->timestamps();
        });
    }
}