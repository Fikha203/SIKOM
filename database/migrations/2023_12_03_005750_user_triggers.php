<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER tr_add_user 
        AFTER INSERT
        ON users FOR EACH ROW
        BEGIN
            IF NEW.level = "mahasiswa" THEN
                INSERT INTO mahasiswas (user_id)
                VALUES (NEW.id);
            ELSEIF NEW.level = "staff" THEN
                INSERT INTO staff (staff_id)
                VALUES (NEW.id);
            END IF;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER tr_add_user");
    }
};
