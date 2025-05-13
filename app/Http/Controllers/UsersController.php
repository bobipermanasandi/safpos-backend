<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::query()->where('roles', '!=', 'admin');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = "<div class=\"d-flex justify-content-center\">
                                        <a href=".route('users.edit', $row->id) ."
                                            class=\"btn btn-sm btn-info btn-icon\">
                                            <i class=\"fas fa-edit\"></i>
                                            Edit
                                        </a>

                                        <button class=\"btn btn-sm btn-danger btn-icon delete-user ml-2\" data-id=\"$row->id\"><i class=\"fas fa-times\"></i> Delete</button>
                                    </div>";

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.users.index');
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(StoreUserRequest $request) {

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'User successfully created');
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        return view('pages.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) {

        $data = $request->validated();
        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->json(['success' => true]);
    }
}
