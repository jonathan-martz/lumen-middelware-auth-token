<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Model\User;
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
        $validator = Validator::make($request->all(), [])->validate();

        $user = $this->request->user();

        if($user) {
            return $next($request);
        }

        return $this->getResponse();
    }

}
