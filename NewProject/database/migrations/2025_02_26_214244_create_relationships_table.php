<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id(); // id column: BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('created_by'); // created_by column
            $table->unsignedBigInteger('parent_id'); // parent_id column
            $table->unsignedBigInteger('child_id'); // child_id column
            $table->timestamps(); // created_at and updated_at columns

            // Indexes
            $table->primary('id'); // Primary key on id column
            $table->index('created_by'); // Index on created_by column
            $table->index('parent_id'); // Index on parent_id column
            $table->index('child_id'); // Index on child_id column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
