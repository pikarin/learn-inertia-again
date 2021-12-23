<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        /** @var \Illuminate\Pagination\Paginator $users */
        $users = User::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        /** @var \App\Models\User */
        $loggedInUser = Auth::user();

        return Inertia::render('Users/Index', [
            'users' => $users->withQueryString()->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
            ]),

            'filters' => $request->only(['search']),
            'can' => [
                'createUsers' => $loggedInUser->can('create', User::class),
            ]
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Users/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    }

    public function edit(int $id): Response
    {
        $user = User::findOrFail($id);

        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $validated = $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $attributes = collect($validated)->filter()->toArray();

        $user->update($attributes);

        return redirect('/users');
    }
}
