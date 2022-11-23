<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('instansi', 191)->nullable();
            $table->string('handphone', 191)->nullable();
            $table->string('tujuan', 191)->nullable();
            $table->string('waktu', 191)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status', 50)->nullable()->default('Pending');
            $table->text('keterangan')->nullable();
            $table->string('created_by', 191)->nullable();
            $table->string('updated_by', 191)->nullable();
            $table->string('deleted_by', 191)->nullable();
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
        Schema::dropIfExists('meetings');
    }
};
