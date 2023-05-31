<?php

namespace App\Http\Middleware;

use App\Models\Unit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetUnit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('web')->user();
        $unit = $request->route('unit');

        if (!$unit instanceof Unit) {
            
            $unit = Unit::where('slug', $unit)->firstOrFail();
            
        }

        $request->route()->forgetParameter('unit');
        $request->route()->setParameter('unit', $unit);

        URL::defaults(['unit' => $unit->slug]);

        if ($user) {

            $users_unit = $user->unit;

            // Set users branch as default for URL generation.
            URL::defaults(['unit' => $users_unit->slug]);

            // if current branch is not the same as the user's branch, redirect to the user's branch dashboard.
            if ($unit->isNot($users_unit) and !($user->getRoleNames()->contains('admin'))) {

                return back();
            }
        }

        return $next($request);
    }
    
    
}
