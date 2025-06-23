<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('features', function (Blueprint $table) {
        if (!Schema::hasColumn('features', 'daily')) {
            $table->boolean('daily')->default(0);
        }

        if (!Schema::hasColumn('features', 'minute')) {
            $table->integer('minute')->nullable();
        }

        if (!Schema::hasColumn('features', 'type')) {
            $table->string('type')->nullable();
        }
    });
}


public function down()
{
    Schema::table('features', function (Blueprint $table) {
        $table->dropColumn(['daily', 'minute', 'type']);
    });
}

};
