<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('features', function (Blueprint $table) {
        $table->boolean('daily')->default(false);
        $table->integer('minute')->nullable();
        $table->string('type')->nullable();
    });
}

public function down()
{
    Schema::table('features', function (Blueprint $table) {
        $table->dropColumn(['daily', 'minute', 'type']);
    });
}

};
