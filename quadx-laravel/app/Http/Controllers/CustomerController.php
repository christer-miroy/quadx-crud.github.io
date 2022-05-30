<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //view customer list
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

    //new customer
    public function saveCustomer (Request $request) {
        $customer = new Customer();
        $customer -> firstName = $request -> firstName;
        $customer -> lastName = $request -> lastName;
        $customer -> photoURL = $request -> photoURL;
        $customer -> address = $request -> address;
        $customer -> mobile = $request -> mobile;
        $customer -> email = $request -> email;
        $customer -> dateOfBirth = $request -> dateOfBirth;
        $customer -> save();
        return response() -> json([
            'message' => 'New customer created successfully',
            'code' => 200
        ]);
    }

    //delete customer
    public function deleteCustomer($id) {
        $customer = Customer::find($id);
        //similar to select id from customers in mysql
        if ($customer) {
            //if the customer id exist
            $customer -> delete();
            return response() -> json([
                'message' => "Customer with id:$id deleted successfully",
                'code' => 200
            ]);
        } else {
            //if id does not exist
            return response() -> json([
                'message' => "Customer with id:$id does not exist",
            ]);
        }
    }
}
