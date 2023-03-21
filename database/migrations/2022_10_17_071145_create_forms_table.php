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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->nullable();
            $table->text('path_logo');
            $table->text('path_qr');
            $table->text('nama_vt');
            $table->text('excerpt');
            $table->text('description');
            $table->boolean('status');;
            $table->text('link_vt');
            $table->text('seo_tittle');
            $table->text('seo_desc');
            $table->softDeletes();
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
        Schema::dropIfExists('forms');
    }
};
