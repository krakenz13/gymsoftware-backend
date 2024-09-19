<?php

namespace App\Http\Controllers\EstudiantesMentorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $type = $request->input('type');

        // Calcula la fecha de fin basada en el tipo de suscripción
        $endDate = Carbon::now();
        switch ($type) {
            case '1_month':
                $endDate = $endDate->addMonth();
                break;
            case '3_months':
                $endDate = $endDate->addMonths(3);
                break;
            case '1_year':
                $endDate = $endDate->addYear();
                break;
        }

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'type' => $type,
            'start_date' => Carbon::now(),
            'end_date' => $endDate,
        ]);

        return response()->json($subscription);
    }

    public function index()
    {
        $user = auth()->user();
        $subscriptions = Subscription::where('user_id', $user->id)->get();
        return response()->json($subscriptions);
    }
}
