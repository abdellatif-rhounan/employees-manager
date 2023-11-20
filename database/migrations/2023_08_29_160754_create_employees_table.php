<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->uuid('id')->unique();
            //***************
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('identity_number', 30)->unique();
            $table->date('date_of_birth');
            $table->string('nationality', 255);
            //***************
            $table->string('email', 100)->unique();
            $table->string('phone', 30)->nullable(true)->unique();
            $table->string('address', 255)->nullable(true);
            $table->string('social_insurance_number', 50)->nullable(true)->unique();
            //***************
            $table->string('department', 255);
            $table->string('position', 255);
            $table->string('status', 30)->nullable(true)->default('undefined');
            $table->string('city_center', 255)->nullable(true);
            $table->string('country', 255)->nullable(true);
            $table->unsignedDecimal('salary', 10, 2)->nullable(true);
            $table->string('account_rib', 50)->nullable(true);
            $table->date('hire_date')->default(now());
            $table->date('termination_date')->nullable(true);
            //***************
            $table->timestamps();
            $table->softDeletes();
            //***************
            $table->primary('id');	
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
