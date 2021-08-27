<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDniDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dni_documents', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
           
            $table->string('dni_number')->nullable();
           
            $table->text('dni')->nullable();
            $table->text('card')->nullable();
          

            
            
            
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
        //
    }
}
