<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    private function validation(array $data)
    {
        Validator::make($data, [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);
    }

    public function token(Request $request)
    {
        $this->validation($request->all());

        $user= User::where('email', '=', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
               'success' => false,
               'message' => 'Invalid login or password.'
            ]);
        }

        return response()->json(['token' => $this->service->token($user, $request->email)]);
    }
}
