<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount', 10, 2);

            $table->date('approved_at')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');

            $table->integer('tenure')->comment('duration in weeks');

            $table->decimal('interest_rate')->nullable();
            $table->decimal('processing_fee')->nullable();

            $table->unsignedInteger('loan_status_id');
            $table->foreign('loan_status_id')->references('id')->on('lookup_values');

            $table->softDeletes();
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
        Schema::dropIfExists('user_loans');
    }
}
