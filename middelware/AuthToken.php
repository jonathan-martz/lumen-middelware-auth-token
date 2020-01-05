<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Class Authenticate
 *
 * @package App\Http\Middleware
 */
class AuthToken extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $validator = Validator::make($request->all(), [
            'auth.token' => 'required|size:512'
        ])->validate();

        if(false) {
            return $next($request);
        }

        $this->addResult('test', 'konalo');

        return $this->getResponse();
    }

}
