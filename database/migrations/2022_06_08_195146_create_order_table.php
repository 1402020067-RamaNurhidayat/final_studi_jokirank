<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jenis_joki_id')->constrained('jenis_joki')->onDelete('cascade');
            $table->foreignId('jenis_rank_id')->constrained('jenis_rank')->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_method')->onDelete('cascade');
            $table->foreignId('login_method_id')->constrained('login_method')->onDelete('cascade');
            $table->string('order_code')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('request_hero');
            $table->string('phone', 25);
            $table->decimal('total_price', 8, 2)->default(0);
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('order');
    }
}
