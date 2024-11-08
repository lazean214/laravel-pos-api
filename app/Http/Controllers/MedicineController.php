<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return Medicine::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $medicine = Medicine::create($validated);
        return response()->json($medicine, 201);
    }

    public function show(Medicine $medicine)
    {
        return $medicine;
    }

    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->all());
        return response()->json($medicine, 200);
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return response()->json(null, 204);
    }
}
