<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Display a listing of suppliers
    public function index()
    {
        return Supplier::all();
    }

    // Show the form for creating a new supplier
    public function create()
    {
        // This is typically used for rendering a form, but we won't need this in an API
    }

    // Store a newly created supplier in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'contact' => 'required|string',
            'address' => 'required|string',
        ]);

        $supplier = Supplier::create($validated);

        return response()->json($supplier, 201);
    }

    // Display the specified supplier
    public function show(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    // Show the form for editing the specified supplier
    public function edit(Supplier $supplier)
    {
        // This is typically used for rendering a form, but we won't need this in an API
    }

    // Update the specified supplier in storage
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'string',
            'contact' => 'string',
            'address' => 'string',
        ]);

        $supplier->update($validated);

        return response()->json($supplier);
    }

    // Remove the specified supplier from storage
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
