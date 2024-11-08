<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;
use App\Models\Supplier;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::all()->each(function ($supplier) {
            Medicine::factory()->count(10)->create(['supplier_id' => $supplier->id]);
        });
    }
}
