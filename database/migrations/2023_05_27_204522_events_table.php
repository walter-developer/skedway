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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->length(100)
                ->comment('Titulo do evento.');
            $table->text('description')->comment('Descrição do evento.');
            $table->timestamp('start')
                ->comment('Data e hora de inicio do evento.');
            $table->timestamp('end')
                ->comment('Data e hora de final do evento.');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
