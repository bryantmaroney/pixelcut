<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {

            $table->integer('content_tactic')->nullable()->change();
            $table->text('target_keyword')->nullable()->change();
            $table->string('framing_keywords')->nullable()->change();
            $table->dateTime('planned_published_date')->nullable()->change();
            $table->dateTime('target_written_by_date')->nullable()->change();
            $table->string('publish_page')->nullable()->change();
            $table->string('writer_id')->nullable()->change();
            $table->text('voice')->nullable()->change();
            $table->text('notes')->nullable()->change();
            $table->text('meta_description')->nullable()->change();
            $table->integer('persona')->nullable()->change();
            $table->integer('pillar')->nullable()->change();
            $table->integer('cluster')->nullable()->change();
            $table->integer('min_words_count')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            //
        });
    }
}
