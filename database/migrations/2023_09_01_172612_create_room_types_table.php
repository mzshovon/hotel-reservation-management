<?php

use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(with(new RoomType)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on(with(new User())->getTable());
            $table->foreign('updated_by')->references('id')->on(with(new User())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(with(new RoomType)->getTable());
    }
};
