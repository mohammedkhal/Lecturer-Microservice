<?php

use App\Models\V1\Lecturer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_lecturers', function (Blueprint $table) {
            $table->bigIncrements('sequence');
            $table->uuid('uuid');
            $table->uuid('user_uuid');
            $table->uuid('facility_uuid');
            $table->uuid('specialization_uuid');
            $table->string('lecturer_grade')->default(Lecturer::GRADE_TEACHING_ASSISTANT);
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('family_name');
            $table->string('status')->default(Lecturer::STATUS_ACTIVE);

            $table->timestamps();

            $table->unique('uuid');
			$table->index('status');
			$table->index('user_uuid');
			$table->index('facility_uuid');
			$table->index('specialization_uuid');
			$table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
