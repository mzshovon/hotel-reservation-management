<?php

use App\Models\Room;
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
        Schema::create(with(new Room)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('title', 55)->index()->nullable();
            $table->text('descrption')->nullable();
            $table->float('regular_price', 18, 2)->nullable();
            $table->float('discounted_price', 18, 2)->nullable();
            $table->integer('diccount')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('dimension', 55)->nullable();
            $table->timestamp('discount_start_date')->nullable();
            $table->timestamp('discount_end_date')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists(with(new Room)->getTable());
    }
};
