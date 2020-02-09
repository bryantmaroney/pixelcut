<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('min_words_count');
            $table->integer('content_type');
            $table->integer('content_tactic');
            $table->integer('target_keyword');
            $table->string('framing_keywords');
            $table->dateTime('planned_published_date');
            $table->dateTime('target_written_by_date');
            $table->string('publish_page');
            $table->string('writer_id');
            $table->text('voice');
            $table->text('notes');
            $table->text('meta_description');
            $table->integer('persona');
            $table->integer('pillar');
            $table->integer('cluster');
            $table->integer('status');
            $table->bigInteger('project_id');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
        });

        Schema::create('content_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('project_id');
            $table->bigInteger('content_id');
            $table->bigInteger('article_id');
            $table->timestamps();
        });

        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->text('article');
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
