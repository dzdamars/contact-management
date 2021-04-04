<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->enum('stat',['uncontacted', 'pending', 'qualified', 'lost'])->default("uncontacted");
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('follow_ups')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
