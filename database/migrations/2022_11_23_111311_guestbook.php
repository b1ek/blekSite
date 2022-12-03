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
        Schema::create('guestbook', function (Blueprint $blue) {
            $blue->id('id');
            $blue->string('name');
            $blue->string('email');
            $blue->text('text');
            $blue->boolean('hidemail', false);
            $blue->string('ip');
            $blue->boolean('hidden', false);
            $blue->bigInteger('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guestbook');
    }
};
