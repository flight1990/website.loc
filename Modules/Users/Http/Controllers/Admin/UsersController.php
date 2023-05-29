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

                    $editLink = '<a href="/admin/users/'.$item->id.'/edit" class="soft-icon-button-amber-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                 </a>';
                    $deleteLink = '<a href="/admin/users/'.$item->id.'" data-method="delete" class="soft-icon-button-rose-sm">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M3 6h18"></path>
                                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                          <path d="M10 11v6"></path>
                                          <path d="M14 11v6"></path>
                                        </svg>
                                   </a>';

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
