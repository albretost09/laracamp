<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $slug = array_key_first($request->query());

        $camp = Camp::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.checkout.checkout', compact('camp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return to_route('checkout.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
