<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Validation\Rule;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users', function () {

        /** @var \Illuminate\Pagination\Paginator $users */
        $users = User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return Inertia::render('Users/Index', [
            'users' => $users->withQueryString()->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
            ]),

            'filters' => Request::only(['search']),
            'can' => [
                'createUsers' => Auth::user()->can('create', User::class),
            ]
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create', User::class);

    Route::post('/users', function () {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    });

    Route::get('/users/{id}/edit', function ($id) {
        $user = User::findOrFail($id);

        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    })->can('update', User::class);

    Route::put('/users/{id}', function ($id) {
        $user = User::findOrFail($id);

        $validated = Request::validate([
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
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
