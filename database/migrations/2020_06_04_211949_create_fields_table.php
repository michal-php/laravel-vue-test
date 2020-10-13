<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('field_type_id');
            $table->unsignedBigInteger('field_block_id');
            $table->string('name');
            $table->string('label');
            $table->integer('sequence');
            $table->timestamps();


            $table->foreign('module_id')
                ->references('id')
                ->on('module');

            $table->foreign('field_type_id')
                ->references('id')
                ->on('c_field_types');

            $table->foreign('field_block_id')
                ->references('id')
                ->on('field_blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
