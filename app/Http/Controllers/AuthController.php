<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $fields = $request->validate([
      'name' => 'required|string',
      'username' => 'required|string',
      'password' => 'required|string',
      'image' => 'string',
      'id_device' => 'nullable|string'
    ]);

    $user = User::create([
      'name' => $fields['name'],
      'username' => strtolower($fields['username']),
      'password' => bcrypt($fields['password']),
      'image' => $fields['image'] ?? 'https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png',
      'id_device' =>  $fields['id_device'] ?? null,
    ]);

    $token = $user->createToken('moviewToken')->plainTextToken;
    $response = [
      'user' => $user,
      'token' => $token
    ];
    return response($response, 201);
  }

  public function login(Request $request)
  {
    $fields = $request->validate([
      'username' => 'required|string',
      'password' => 'required|string',
      'id_device' => 'nullable|string'
    ]);

    $user = User::where('username', strtolower($fields['username']))->first();
    if (!$user) {
      return response(['message' => 'Usuario no encontrado'], 401);
    }

    if (!Hash::check($fields['password'], $user->password)) {
      return response(['message' => 'Contraseña incorrecta'], 401);
    }
    $user->id_device = $fields['id_device'] ?? null;
    $user->save();
    $token = $user->createToken('moviewToken')->plainTextToken;
    $response = [
      'user' => $user,
      'token' => $token
    ];
    return response($response, 200);
  }

  public function logout(Request $request)
  {
    $user = (object) auth()->user();
    $user->tokens->each(function ($token, $key) {
      $token->delete();
    });
    $user->id_device = null;
    $user->save();
    return [
      'message' => 'Sesión cerrada exitosamente'
    ];
  }
}
