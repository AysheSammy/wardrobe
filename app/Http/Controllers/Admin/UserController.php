<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = User::orderBy('username')
            ->get();

        return view('admin.user.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = User::findOrFail($id);

        return view('admin.user.edit')
            ->with([
                'obj' => $obj,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($obj->id)],
            'password' => ['nullable', Rules\Password::defaults()],
        ]);

        $obj->name = $request->name;
        $obj->username = $request->username;
        if (isset($request->password)) {
            $obj->password = Hash::make($request->password);
        }
        $obj->update();

        return to_route('admin.users.index')
            ->with([
                'success' => trans('app.user') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1 or $id == auth()->id()) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        } else {
            $obj = User::findOrFail($id);
            $objName = $obj->name;

            $obj->delete();

            return redirect()->back()
                ->with([
                    'success' => trans('app.user') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
                ]);
        }
    }
}
