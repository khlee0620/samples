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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // 외국인의 경우 이름 길이에 제한이 없음
            $table->string('name', 50);
            // https://www.lifewire.com/is-email-address-length-limited-1171110 - 이메일 총 길이는 254
            $table->string('email', 254)->unique();
            $table->timestamp('email_verified_at')->nullable();
            // 해시형태로 저장되어 현재 길이는 제한하지 않음 -> 좀 더 알아보기
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
