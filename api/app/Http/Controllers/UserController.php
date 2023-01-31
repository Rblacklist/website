<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends ApiController
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) return $this->sendError('Validation Error.', $validator->errors(), 422);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user             = Auth::user();
            $success['name']  = $user->name;
            $success['token'] = $user->createToken('accessToken')->accessToken;

            return $this->sendResponse($success, 'You are successfully logged in.');
        }

        return $this->sendError('Unauthorised', ['error' => 'Unauthorised'], 401);
    }

    /**
     * User registration API method
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) return $this->sendError('Validation Error.', $validator->errors(), 422);

        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $success['name']  = $user->name;
            $message          = 'Yay! A user has been successfully created.';
            $success['token'] = $user->createToken('accessToken')->accessToken;
        } catch (Exception $e) {
            $success['token'] = [];
            $message          = 'Oops! Unable to create a new user.';
        }

        return $this->sendResponse($success, $message);
    }

    public function verifyEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
        ]);

        if (!User::where('email', $validatedData['email'])->exists()) {
            return response(['message' => 'Email not found'], 404);
        }

        // Add code to send email verification link

        return response(['message' => 'Verification link sent']);
    }

    public function logout(Request $request)
    {
        $success['name']  = $request->user->name;
        $request->user()->token()->revoke();
        $message          = 'Successfully logged out';
        return $this->sendResponse($success, $message);
    }
}
