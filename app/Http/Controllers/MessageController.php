<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'customer_ids' => 'required|array',
            'message' => 'required|string'
        ]);

        $customers = Customer::whereIn('id', $request->customer_ids)->get();

        foreach ($customers as $customer) {
            Mail::raw($request->message, function ($mail) use ($customer) {
                $mail->to($customer->email)
                    ->subject('New Message from Customer Management');
            });
        }

        return redirect()->back()->with('success', 'Messages sent successfully!');
    }
}
