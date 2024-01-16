<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            // Add other validation rules as needed
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }


    public function showOrdersByCustomer(string $customerId)
{
    $customer = Customer::findOrFail($customerId);
    $orders = $customer->orders()->with('products')->get();

    return view('invoices.customer_orders', compact('customer', 'orders'));
}


/*

public function generateInvoice($customerId)
{
    $customer = Customer::findOrFail($customerId);
    $totalAmount = $customer->orders()->sum('total_amount');

    return view('invoices.customer_invoice', compact('customer', 'totalAmount'));
}*/
}
