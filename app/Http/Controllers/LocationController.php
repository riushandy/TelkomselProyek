<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->paginate(10);

        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'location_name' => [
                'required',
                'string',
                'max:100',
                'unique:locations,location_name',
            ],

            'location_description' => [
                'nullable',
                'string',
                'max:255',
            ],

        ]);

        Location::create($validated);

        return redirect()
            ->route('location.index')
            ->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([

            'location_name' => [

                'required',
                'string',
                'max:100',

                Rule::unique('locations')->ignore($location->id),

            ],

            'location_description' => [

                'nullable',
                'string',
                'max:255',

            ],

        ]);

        $location->update($validated);

        return redirect()
            ->route('location.index')
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()
            ->route('location.index')
            ->with('success', 'Location deleted successfully.');
    }
}
