<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;

class LocationController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Location/Index', [
            'locations' => Location::all(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Location/Create');
    }

    public function store(Request $request): object
    {
        Location::create(
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'location' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ])
        );

        return Redirect::route('locations.index');
    }

    public function edit(Request $request, int $location_id): Response
    {
        return Inertia::render('Location/Edit', [
            'location' => Location::findOrFail($location_id),
        ]);
    }

    public function update(Request $request, int $location_id): object
    {
        Location::findOrFail($location_id)->update(
            $request->validate([
                'name' => ['sometimes', 'string', 'max:255'],
                'location' => ['sometimes', 'string', 'max:255'],
                'description' => ['sometimes', 'string', 'max:255'],
            ])
        );

        return Redirect::route('locations.index');
    }
}
