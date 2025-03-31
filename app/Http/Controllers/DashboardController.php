<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Conversation;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $customerCount = Customer::count();
        $conversationCount = Conversation::count();
        $messageCount = Message::count();

        return view('dashboard', compact('customerCount', 'conversationCount', 'messageCount'));
    }
}
