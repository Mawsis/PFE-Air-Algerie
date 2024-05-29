<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'directions' => Direction::all(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'nom' => 'required|alpha',
            'prenom' => 'required|alpha',
            'telephone' => 'required|numeric|unique:' . User::class,
            'email' => 'required|string|lowercase|email|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'direction_id' => 'required|exists:directions,id'
        ], [
            'nom.required' => 'Le champ nom est obligatoire.',
            'nom.alpha' => 'Le champ nom doit contenir uniquement des lettres, des espaces, des traits d\'union et des apostrophes.',
            'prenom.required' => 'Le champ prénom est obligatoire.',
            'prenom.alpha' => 'Le champ prénom doit contenir uniquement des lettres, des espaces, des traits d\'union et des apostrophes.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le champ email doit être une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'telephone.required' => 'Le champ téléphone est obligatoire.',
            'telephone.numeric' => 'Le champ téléphone doit être un numéro algérien valide.',
            'password.required' => 'Le champ mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'direction_id' => $request->direction_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('/', absolute: false));
    }
}
