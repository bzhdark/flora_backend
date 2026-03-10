<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\DTOs\RegisterDto;
use App\Models\Exploitation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Actions\Auth\RegisterUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
            'device_name' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email ou mot de passe incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * Supprime le token en cours de l'utilisateur
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        info($request->user());
        $request->user()->currentAccessToken()->delete();
        return response()->json("Logout effectué");
    }

    /**
     * @throws \Throwable
     */
    public function register(RegisterDto $dto, RegisterUser $registerUser)
    {
        // Créer user et son exploitation
        $user = $registerUser->execute($dto);
        // Créer le token
        $token = $user->createToken($dto->device_name)->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
