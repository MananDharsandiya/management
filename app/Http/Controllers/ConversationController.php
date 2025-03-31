<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Customer;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::with('customer')->get();
        return view('conversations.index', compact('conversations'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('conversations.create', compact('customers'));
    }

    public function store(Request $request)
    {
        Conversation::create($request->all());
        return redirect()->route('conversations.index');
    }
}
