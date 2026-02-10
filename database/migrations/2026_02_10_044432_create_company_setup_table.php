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
        Schema::create('company_setup', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('phone_number');
            $table->string('fax_number')->nullable();
            $table->string('email_address');
            $table->string('official_company_number');
            $table->string('company_website');
            $table->string('GSTNo');
            $table->string('home_currency');
            $table->string('annual_turnover_estimate');
            $table->string('company_logo')->nullable();
            $table->boolean('delete_company_logo')->default(false);
            $table->boolean('company_logo_on_views')->default(false);
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_telephone');
            $table->string('fiscal_year');
            $table->integer('tax_periods')->nullable();
            $table->integer('tax_last_period')->default(1);
            $table->integer('no_of_workers');
            $table->string('business_type');
            $table->text('company_brief');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_setup');
    }
};
