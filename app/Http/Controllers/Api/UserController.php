<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Récupération de l'utilisateur connecté
     *
     * @return JsonResource Renvoie une Resource de User
     */
    public function index(): JsonResource
    {
        return new UserResource(Auth::user());
    }
}
