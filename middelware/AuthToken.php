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
        $validator = Validator::make($request->all(), [
            'auth.userid' => 'required|integer',
            'auth.token' => 'required|size:512'
        ])->validate();

        $check = DB::table('topic_tokens')
            ->where('userid', '=', $this->request->input('auth.userid'))
            ->where('token', '=', $this->request->input('auth.token'));

        if($check->count() === 1) {
            $user = DB::table('users')->where('id', '=', $this->request->input('auth.userid'));

            $user = new User($user->first());

            var_dump($user->getAuthIdentifier());

            // return $next($request);
        }

        $this->addResult('test', 'konalo');

        return $this->getResponse();
    }

}
