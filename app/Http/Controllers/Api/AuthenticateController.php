<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Models\TerminalDataReceive;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user= User::Where('name',$request->name)->first();
            // dd($request->all());
            
            if(!Auth::attempt($request->only(['name', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'These credentials do not match our records.',
                ], 401);
            }
            // $terminalAllData=TerminalDataReceive::orderBy('id', 'DESC')->get();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'access_token' => $user->createToken('auth_token')->plainTextToken,
                'token_type' => 'Bearer',
                'user' => $user,
                // 'terminalAllData' => $terminalAllData,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::user()->tokens()->where('id', Auth::user()->currentAccessToken()->id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'User Logged Out Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}