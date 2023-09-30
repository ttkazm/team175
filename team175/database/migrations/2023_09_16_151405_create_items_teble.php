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
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id')->index()->comment('ID');
            $table->bigInteger('user_id')->index()->comment('ユーザーID');
            $table->string('name',100)->index()->comment('名前');
            $table->smallInteger('type')->nullable()->default(null)->comment('種別');
            $table->string('detail',500)->nullable()->default(null)->comment('詳細');
            $table->timestamp('created_at')->nullable()->default(null)->comment('登録日時');
            $table->timestamp('updated_at')->nullable()->default(null)->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
