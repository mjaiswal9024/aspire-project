<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('loan_id');
            $table->foreign('loan_id')->references('id')->on('user_loans');


            $table->double('amount', 10, 2);
            $table->double('late_payment_fee', 10,2)->default(0);

            $table->date('due_date');

            $table->dateTime('paid_at')->nullable();

            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('lookup_values');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_payments');
    }
}
