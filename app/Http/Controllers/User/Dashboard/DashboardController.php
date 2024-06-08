<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $checkouts = Checkout::query()
            ->with(['user', 'camp'])
            ->whereUserId(auth()->id())
            ->get();

        return view('pages.user.dashboard.index', compact('checkouts'));
    }
}
