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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('org_name');
            $table->string('register_authority');
            $table->string('org_type');
            $table->string('org_reg_no');
            $table->string('org_register_date');
            $table->string('org_url');
            $table->string('org_description');
            $table->string('org_f_name');
            $table->string('org_f_designation');
            $table->string('org_f_email');
            $table->string('org_f_phone');
            $table->string('org_country');
            $table->string('org_province');
            $table->string('org_district');
            $table->string('org_tehsil');
            $table->string('org_UC');
            $table->string('org_village');
            $table->string('org_postal_address');
            $table->string('theme');
            $table->string('org_bank');
            $table->string('org_audit');
            $table->string('org_noc');
            $table->string('org_policies');
            $table->integer('org_staff');
            $table->integer('org_volunteers');
            $table->string('org_certificate');
            $table->string('org_strategic_plan');
            $table->string('org_terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};