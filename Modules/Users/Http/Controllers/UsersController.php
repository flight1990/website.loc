<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Roles\Actions\AdminGetAllRolesForUser;
use Modules\Users\Actions\AdminCreateUserAction;
use Modules\Users\Actions\AdminDeleteUserAction;
use Modules\Users\Actions\AdminFindUserByIDAction;
use Modules\Users\Actions\AdminGetAllUsersAction;
use Modules\Users\Actions\AdminUpdateUserAction;
use Modules\Users\Http\Requests\CreateUserRequest;
use Modules\Users\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {
            return app(AdminGetAllUsersAction::class)->run();
        }

        return Inertia::render('Users::UsersIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Users::UsersModify');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        app(AdminCreateUserAction::class)->run($request->validated());
        return redirect()->route('admin.users.index');
    }

    public function edit($id): Response
    {
        $user = app(AdminFindUserByIDAction::class)->run($id);
        return Inertia::render('Users::UsersModify', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        app(AdminUpdateUserAction::class)->run($request->validated(), $id);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id): RedirectResponse
    {
        app(AdminDeleteUserAction::class)->run($id);
        return redirect()->route('admin.users.index');
    }
}
