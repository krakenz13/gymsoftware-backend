<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    
    public function index()
    {
        $subscriptions = Subscription::all();

        return response()->json($subscriptions);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'duration_months' => 'required|integer|min:1',
            
        ]);

        $subscription = Subscription::create([
            'start_date' => $request->input('start_date'),
            'duration_months' => $request->input('duration_months'),
         
        ]);

        return response()->json($subscription, 201);
    }

  
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'start_date' => 'required|date',
            'duration_months' => 'required|integer|min:1',
            
        ]);

        $subscription->update([
            'start_date' => $request->input('start_date'),
            'duration_months' => $request->input('duration_months'),
            
        ]);

        return response()->json($subscription, 200);
    }

  
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return response()->json(null, 204);
    }
}