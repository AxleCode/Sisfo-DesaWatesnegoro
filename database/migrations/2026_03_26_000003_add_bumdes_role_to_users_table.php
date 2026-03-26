<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Enum alter is database-specific. This project runs on MySQL/MariaDB in Laragon,
        // so we use a raw ALTER to avoid requiring doctrine/dbal for ->change().
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE `users` MODIFY `role` ENUM('admin','staff','warga','bumdes') NOT NULL DEFAULT 'warga'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE `users` MODIFY `role` ENUM('admin','staff','warga') NOT NULL DEFAULT 'warga'");
        }
    }
};

