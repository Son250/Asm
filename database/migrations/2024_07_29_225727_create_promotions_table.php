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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  //mã code áp dụng
            $table->string('title');  // tên
            $table->text('description')->nullable();   //mô tả
            $table->decimal('discount_amount', 8, 2);  //Số tiền giảm
            $table->date('start_date');    //ngày bắt đầu giảm giá
            $table->date('end_date');       // ngày kết thúc
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
