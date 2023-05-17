<?php

namespace Modules\Users\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Users\Http\Requests\CreateUserRequest;
use Modules\Users\Http\Requests\UpdateUserRequest;
use Modules\Users\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() && !$request->inertia()) {

            $query = User::query()
                ->select(['id', 'name', 'email']);

            return DataTables::eloquent($query)
                ->addColumn('actions', function ($item) {

                    $editLink = '<a href="/admin/users/'.$item->id.'/edit">Редактировать</a>';
                    $deleteLink = '<a href="/admin/users/'.$item->id.'" data-method="delete">Удалить</a>';

                    return $editLink.' '.$deleteLink;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return Inertia::render('Users::Admin/AdminUsersIndex');
    }

    public function create(): Response
    {
        return Inertia::render('Users::Admin/AdminUsersModify');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('admin.users.index');
    }

    public function edit($id): Response
    {
        $user = User::query()
            ->select(['id', 'name', 'email'])
            ->findOrFail($id);

        return Inertia::render('Users::Admin/AdminUsersModify', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $payload = $request->validated();

        if (!empty($payload['password'])) {
            $payload['password'] = bcrypt($payload['password']);
        } else {
            unset($payload['password']);
        }

        $user = User::query()->findOrFail($id);
        $user->update($payload);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
