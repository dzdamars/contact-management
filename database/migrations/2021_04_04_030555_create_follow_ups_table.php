<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('cust_id');
            $table->enum('stat',['uncontacted', 'pending', 'qualified', 'lost']);
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
        Schema::table('follow_ups', function (Blueprint $table) {
            $table->foreign('agent_id')->references('id')->on('users');
            $table->foreign('cust_id')->references('id')->on('customers')
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
        Schema::dropIfExists('follow_ups');
    }
}
