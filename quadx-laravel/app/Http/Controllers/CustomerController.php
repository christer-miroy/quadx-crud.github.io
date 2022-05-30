<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function customers() {
        $customers = Customer::all();
        return response() -> json(
            [
                'customers' => $customers,
                'message' => 'Customers',
                'code' => 200
            ]
        );
    }
}
