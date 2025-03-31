<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerMessageMail;

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
        Customer::create($request->all());
        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'selected_customers' => 'required|array',
            'message' => 'required|string',
        ]);

        $customers = Customer::whereIn('id', $request->selected_customers)->get();

        foreach ($customers as $customer) {
            Mail::to($customer->email)->send(new CustomerMessageMail($request->message));
        }

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
