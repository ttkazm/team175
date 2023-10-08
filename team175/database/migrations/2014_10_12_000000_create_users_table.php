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
            $table->bigIncrements('id')->index()->comment('ID');
            $table->string('name',100)->index()->comment('名前');
            $table->string('email',255)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->default(null)->comment('メールアドレス確認日時');
            $table->string('password',255)->comment('パスワード');
            $table->string('rememberToken',100)->nullable()->default(null)->comment('保持トークン');
            $table->tinyInteger('role_id')->default(0)->comment('0:一般 1:管理者');
            $table->timestamp('created_at')->nullable()->default(null)->comment('登録日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
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
