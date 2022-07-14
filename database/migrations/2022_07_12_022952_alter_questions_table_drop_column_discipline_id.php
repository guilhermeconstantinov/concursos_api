<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuestionsTableDropColumnDisciplineId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('discipline_id');
            $table->json('alternative');
            $table->foreignId('topic_id');

            $table->foreign('topic_id')
                ->references('id')
                ->on('topics')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('discipline_id')
                ->references('id')
                ->on('discipline')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dropColumn('topic_id');
            $table->dropColumn('alternative');
        });
    }
}
