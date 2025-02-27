<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id(); // id column: BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('created_by'); // created_by column
            $table->string('first_name'); // first_name column
            $table->string('last_name'); // last_name column
            $table->string('birth_name')->nullable(); // birth_name column
            $table->string('middle_names')->nullable(); // middle_names column
            $table->date('date_of_birth')->nullable(); // date_of_birth column
            $table->timestamps(); // created_at and updated_at columns

            // Indexes
            $table->primary('id'); // Primary key on id column
            $table->index('created_by'); // Index on created_by column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
