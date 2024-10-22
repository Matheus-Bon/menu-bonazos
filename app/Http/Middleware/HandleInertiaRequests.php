<?php

namespace App\Http\Middleware;

use App\Models\Unit;
use App\Models\User;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request = null): array
    {   
        $unitsAll = Unit::all();

        $units = $unitsAll->map(function($unit){
            return [
                'name' => $unit->name,
                'slug' => $unit->slug
            ];
        });
        
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
                
            ],
            'units' => $units,
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'toast' => session('toast')

            
        ]);
    }
}
