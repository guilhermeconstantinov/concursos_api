<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDisciplineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discipline', function (Blueprint $table) {
            $table->dropColumn('wording');
            $table->dropColumn('alternative');
            $table->dropColumn('correct_alternative');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discipline', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
