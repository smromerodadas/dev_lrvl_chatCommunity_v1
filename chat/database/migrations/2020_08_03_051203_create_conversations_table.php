<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('conversation_parent_id')->nullable();
            $table->string('series_num')->nullable();
            $table->string('name')->nullable();
            $table->string('theme')->nullable();
            $table->string('subject')->nullable();
            $table->string('conversation_type')->nullable();
            $table->string('pofsis_type')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('active')->nullable();
            $table->string('data_status')->nullable();
            
            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}

