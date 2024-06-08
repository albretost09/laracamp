<?php

namespace App\Http\Controllers\User\Checkout;

use Exception;
use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\StoreCheckoutRequest;

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
    public function create(Camp $camp)
    {
        $camp = Camp::query()
            ->where('slug', $camp->slug)
            ->firstOrFail();

        return view('pages.user.checkout.create', compact('camp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCheckoutRequest $request, Camp $camp)
    {
        try {
            DB::transaction(function () use ($request, $camp) {
                // update data user
                auth()->user()->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'occupation' => $request->occupation
                ]);

                // create data checkout
                Checkout::create($request->validated() + [
                    'user_id' => auth()->id(),
                    'camp_id' => $camp->id,
                ]);
            });

            return to_route('checkout.success');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
