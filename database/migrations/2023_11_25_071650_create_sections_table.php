<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('detailed_description');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections');
        });

        Schema::create(
            'page_section',
            function (Blueprint $table) {
                $table->foreignId('page_id')->constrained('pages', 'id');
                $table->foreignId('section_id')->constrained('sections', 'id');
                $table->integer('hierarchy');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
