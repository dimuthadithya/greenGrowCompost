<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Store a newly created address in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'is_default' => ['sometimes', 'boolean'],
        ]);

        DB::transaction(function () use ($validated) {
            if (!empty($validated['is_default'])) {
                // Remove default status from other addresses
                Auth::user()->addresses()->update(['is_default' => false]);
            }

            // If this is the user's first address, make it default
            if (Auth::user()->addresses()->count() === 0) {
                $validated['is_default'] = true;
            }

            Auth::user()->addresses()->create($validated);
        });

        return back()->with('status', 'address-added');
    }

    /**
     * Update the specified address in storage.
     */
    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'is_default' => ['sometimes', 'boolean'],
        ]);

        DB::transaction(function () use ($address, $validated) {
            if (!empty($validated['is_default'])) {
                // Remove default status from other addresses
                Auth::user()->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
            }

            $address->update($validated);
        });

        return back()->with('status', 'address-updated');
    }

    /**
     * Remove the specified address from storage.
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        if ($address->is_default) {
            // If deleting default address, make the oldest remaining address default
            $newDefault = Auth::user()->addresses()
                ->where('id', '!=', $address->id)
                ->oldest()
                ->first();

            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        $address->delete();

        return back()->with('status', 'address-deleted');
    }

    /**
     * Set an address as default.
     */
    public function setDefault(Address $address)
    {
        $this->authorize('update', $address);

        DB::transaction(function () use ($address) {
            // Remove default status from other addresses
            Auth::user()->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);

            // Set this address as default
            $address->update(['is_default' => true]);
        });

        return back()->with('status', 'address-default-updated');
    }
}
