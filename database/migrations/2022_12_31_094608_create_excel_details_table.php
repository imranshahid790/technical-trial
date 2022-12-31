<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Excel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Excel::class)->constrained()->cascadeOnDelete();
            $table->text('name')->nullable();
            $table->string('roll_number')->nullable();
            $table->string('class')->nullable();
            $table->string('department')->nullable();
            $table->text('title')->nullable();
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
        Schema::dropIfExists('excel_details');
    }
};