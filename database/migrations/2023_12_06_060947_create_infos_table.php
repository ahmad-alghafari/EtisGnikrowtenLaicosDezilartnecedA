<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('follower')->nullable($value = false)->default(0);
            $table->integer('following')->nullable($value = false)->default(0);
            $table->integer('posts_number')->nullable($value = false)->default(0);
            $table->string('phone')->nullable();
            $table->string('overview')->nullable();
            $table->string('address')->nullable();
            $table->date('birth')->nullable();
            $table->string('job')->nullable();
            $table->enum('community_status' , ['single' , 'married' ,'divorced' , 'in a relationship' , 'taken' ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
