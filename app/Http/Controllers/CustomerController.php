<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index()
    {
        return Customer::all();
    }

    // Show the form for creating a new customer
    public function create()
    {
        // Not needed in an API
    }

    // Store a newly created customer in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string',
        ]);

        $customer = Customer::create($validated);

        return response()->json($customer, 201);
    }

    // Display the specified customer
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    // Update the specified customer in storage
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:customers,email,' . $customer->id,
            'phone' => 'string',
        ]);

        $customer->update($validated);

        return response()->json($customer);
    }

    // Remove the specified customer from storage
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
