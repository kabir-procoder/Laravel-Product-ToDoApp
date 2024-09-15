<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('image',255)->nulable();
            $table->string('title',255)->nulable();
            $table->string('old_price',255)->nulable();
            $table->string('new_price',255)->nulable();
            $table->string('color',255)->nulable();
            $table->text('short_description')->nulable();
            $table->longText('description')->nulable();
            $table->tinyInteger('status')->default(0)->comment('0:active, 1:Deactive');
            $table->tinyInteger('isDelete')->default(0)->comment('0:active, 1:softDelete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
