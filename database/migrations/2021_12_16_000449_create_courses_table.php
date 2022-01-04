<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->enum('color', Course::COLORS)->default(Course::COLORS[0]);
            $table->integer('homeworks_weight');
            $table->integer('lessons_weight');
            $table->integer('exams_weight');
            $table->integer('min_grade');
            $table->integer('min_attendance');

            // Foreign Fields
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('pensum_id')->nullable();
            $table->foreign('pensum_id')->references('id')->on('pensums')->onDelete('set null');

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
        Schema::dropIfExists('courses');
    }
}
