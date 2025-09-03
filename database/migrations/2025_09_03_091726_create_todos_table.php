<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();

            $table->string('title'); // Lühike tekst (VARCHAR)

            $table->text('description')->nullable(); //Sisu, nullable tähendab, et see võib jääda tühjaks

            $table->boolean('is_completed')->default(false); //Tõeväärtus - kas ülesanne on tehtud jah/ei, vaikimisi on "EI"

            $table->timestamps(); // seda rida kasutab nii update kui ka added
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
