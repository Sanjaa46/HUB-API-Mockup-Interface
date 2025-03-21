<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;
use Carbon\Carbon;

class GraphQLAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip auth for login mutation
        $input = $request->input('query', '');
        if (strpos($input, 'mutation') !== false && strpos($input, 'login') !== false) {
            return $next($request);
        }

        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'errors' => [
                    [
                        'message' => 'Unauthorized: Authentication token is required',
                    ]
                ]
            ], 401);
        }

        // Check if token exists and is valid
        $tokenRecord = Token::where('access_token', $token)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$tokenRecord) {
            return response()->json([
                'errors' => [
                    [
                        'message' => 'Unauthorized: Invalid or expired token',
                    ]
                ]
            ], 401);
        }

        return $next($request);
    }
}