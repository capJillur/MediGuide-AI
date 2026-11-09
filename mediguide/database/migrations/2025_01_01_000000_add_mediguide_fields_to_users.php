<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->string('role')->default('user')->after('email');   // user | doctor | admin
            $t->string('phone')->nullable();
            $t->string('specialty')->nullable();
            $t->string('license_no')->nullable();
            $t->string('otp_code')->nullable();
            $t->timestamp('otp_expires_at')->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('users', fn (Blueprint $t) => $t->dropColumn(['role','phone','specialty','license_no','otp_code','otp_expires_at']));
    }
};
