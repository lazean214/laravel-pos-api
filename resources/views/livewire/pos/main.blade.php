<div class="p-4">
    <!-- Header Section -->
    <div class="flex flex-wrap w-full bg-orange-400 p-4 rounded-lg shadow-lg">
        <!-- Left Section (Invoice Details) -->
        <div class="w-1/2 p-4">
            <div class="flex justify-between mb-4">
                <div class="w-1/2 bg-gray-500 p-3 text-white text-center rounded-lg">S-0000123</div>
                <div class="w-1/2 bg-amber-500 p-3 text-white text-center rounded-lg">{{ date('d/m/Y h:i:s') }}</div>
            </div>
            <div>
                <label for="search" class="block mb-2 text-lg font-semibold">Search</label>
                <input type="text" id="search" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
        </div>
        <!-- Right Section (Basket Details) -->
        <div class="w-1/2 p-4">
            <div class="text-xl font-semibold mb-4">Basket Item List</div>
            <div class="bg-gray-200 p-4 rounded-lg shadow-md mb-4">
                <!-- Basket Window buttons and info can go here -->
                <div class="flex justify-between mb-4">
                    <div class="w-1/2 text-center py-2 bg-blue-500 text-white rounded-md">Basket Button 1</div>
                    <div class="w-1/2 text-center py-2 bg-blue-500 text-white rounded-md">Basket Button 2</div>
                </div>
            </div>
            <div>
                <div class="font-semibold text-lg">Total</div>
                <div class="py-2 bg-white text-center text-2xl font-bold border rounded-md">0.00</div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-4 mt-6">
        <button class="bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">Save Transaction</button>
        <button class="bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition">Change Qty/Price</button>
        <button class="bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 transition">Functions</button>
        <button class="bg-purple-500 text-white py-2 rounded-md hover:bg-purple-600 transition">Records</button>
        <button class="bg-teal-500 text-white py-2 rounded-md hover:bg-teal-600 transition">Accounts Module</button>
        <button class="bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition">Inventory Module</button>
        <button class="bg-red-500 text-white py-2 rounded-md hover:bg-red-600 transition">Settings</button>
        <button class="bg-gray-500 text-white py-2 rounded-md hover:bg-gray-600 transition">Reset Basket</button>
        <button class="bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition">Show History</button>
    </div>
</div>
