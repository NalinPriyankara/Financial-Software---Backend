<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetup extends Model
{
    use HasFactory;

    protected $table = 'company_setup';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'fax_number',
        'email_address',
        'official_company_number',
        'company_website',
        'GSTNo',
        'home_currency',
        'annual_turnover_estimate',
        'company_logo',
        'delete_company_logo',
        'company_logo_on_views',
        'owner_name',
        'owner_email',
        'owner_telephone',
        'fiscal_year',
        'tax_periods',
        'tax_last_period',
        'no_of_workers',
        'business_type',
        'company_brief',
    ];
}
