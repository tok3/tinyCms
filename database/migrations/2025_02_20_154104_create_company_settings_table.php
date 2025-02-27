<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Verknüpfung zur Firma
            $table->boolean('contrast_errors')->default(false); // Kontrastprüfung ein/aus

            $table->enum('default_standard', ['2.0', '2.1'])->default('2.1'); // Standard-WCAG-Version
            $table->integer('max_urls')->default(10); // Maximal erlaubte URLs
            $table->boolean('auto_add_urls')->default(1); // Kontrastprüfung ein/aus
            $table->timestamps();
        });


        DB::statement("
            INSERT INTO company_settings (company_id, default_standard, contrast_errors, max_urls, auto_add_urls, created_at, updated_at)
            SELECT
                c.id,
                '2.1' AS default_standard,
                0 AS contrast_errors,
                10 AS max_urls,
                1 AS auto_add_urls,
                NOW() AS created_at,
                NOW() AS updated_at
            FROM companies c
            LEFT JOIN company_settings cs ON c.id = cs.company_id
            WHERE cs.company_id IS NULL;
        ");

    }

    public function down()
    {
        Schema::dropIfExists('company_settings');
    }
};
