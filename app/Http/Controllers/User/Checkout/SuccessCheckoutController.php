<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessCheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('pages.user.checkout.success');
    }
}
