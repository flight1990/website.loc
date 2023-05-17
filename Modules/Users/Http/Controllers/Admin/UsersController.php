<?php

namespace Modules\Users\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Users\Http\Requests\CreateUserRequest;
use Modules\Users\Http\Requests\UpdateUserRequest;
use Modules\Users\Repositories\UserRepository;

class UsersController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return $this->userRepository->getAll(['id', 'name', 'email']);
        }

        return Inertia::render('Users::Admin/AdminUsersIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Users::Admin/AdminUsersModify');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->userRepository->create($request->validated());

        return redirect()->route('admin.users.index');
    }

    public function edit($id): Response
    {
        $user = $this->userRepository->findByID($id);

        return Inertia::render('Users::Admin/AdminUsersModify', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $this->userRepository->update($request->validated(), $id);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id): RedirectResponse
    {
        $this->userRepository->delete($id);

        return redirect()->route('admin.users.index');
    }
}
