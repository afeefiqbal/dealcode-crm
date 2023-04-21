<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create(['title' => 'PayPal Without Charges']);
        PaymentMethod::create(['title' => 'PayPal With Charges']);
        PaymentMethod::create(['title' => 'Payoneer']);
        PaymentMethod::create(['title' => 'Wise']);
        PaymentMethod::create(['title' => 'Revolut']);
        PaymentMethod::create(['title' => 'Stripe']);
        PaymentMethod::create(['title' => 'UPI']);

    }
}
