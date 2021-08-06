<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->text('remit')->nullable();
            $table->text('dni')->nullable();
            $table->text('card')->nullable();
            $table->text('sign')->nullable();
            $table->string('dni_number')->nullable();
            $table->string('card_number')->nullable();

            
            
            
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
        Schema::dropIfExists('orders');
    }
}
