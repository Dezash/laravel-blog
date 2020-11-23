<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->index()->constrained('users');
            $table->string('title');
            $table->text('body');
            $table->string('nature')->nullable();
            $table->foreignId('reviewer_id')->nullable()->index()->constrained('users');
            $table->enum('state', ['REJECTED', 'SUBMITTED', 'APPROVED'])->default('SUBMITTED');
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
        Schema::dropIfExists('blogs');
    }
}
