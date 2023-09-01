<?php

namespace App\Http\Controllers;

// use App\Models\user;

use App\Models\Admin;
use App\Models\city;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class Usercontroller extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::withCount('permissions')->with('city')->get();
        $users = User::with('roles')->get();

        return response()->view('cms.user.index', ['user' => $users, 'roles' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $citys = City::where('active', '=', true)->get();
        $roles = Role::where('guard_name', '=', 'user')->get();
        return response()->view('cms.user.creat', ['citys' => $citys, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator($request->all(), [
            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'city_id' => 'required|numeric|exists:cities,id',
            'phoneNumper' => 'required|string|min:10',
            'image' => 'required|image|max:2048|mimes:jpg,png'
        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->assignRole(Role::findOrFail($request->input('role_id')));
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->city_id = $request->input('city_id');
            $user->phoneNumper = $request->input('phoneNumper');
            $user->password = Hash::make('password');
            if ($request->hasFile('image')) {
                $imageName = time() . "_user_image" . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('images', $imageName);
                $user->image = 'images/' . $imageName;
            }
            $isSaved = $user->save();

            if ($isSaved) {
                $admin = Admin::first();
                $admin->notify(new NewUserNotification($user));
            }
            return Response()->json(

                ['message' => $isSaved ? 'created successfully' : 'created failed!'],

                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(["message" => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles = Role::where('guard_name', '=', 'user')->get();
        $userRoles = $user->roles[0];
        $citys = City::Where('active', '=', true)->get();
        return Response()->view('cms.user.update', ['citys' => $citys, 'user' => $user, 'roles' => $roles, 'userRoles' => $userRoles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $validator = Validator($request->all(), [
            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'city_id' => 'required|numeric|exists:cities,id',
            'phoneNumper' => 'required|string|min:10',
            'image' => 'nullable|image|max:2048|mimes:jpg,png'


        ]);
        if (!$validator->fails()) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->city_id = $request->input('city_id');
            $user->phoneNumper = $request->input('phoneNumper');
            if ($request->hasFile('image')) {
                Storage::delete($user->image);
                $imageName = time() . "_user_image" . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('images', $imageName);
                $user->image = 'images/' . $imageName;
            }
            $isSaved = $user->save();
            if ($isSaved) $user->syncRoles(Role::findOrFail($request->input('role_id')));

            return response()->json(
                [
                    'message' => $isSaved ? 'update successfully' : 'update failed!'
                ],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST


            );
        } else {
            return response()->json(["message" => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $deleted = $user->delete();
        if ($deleted) {
            Storage::delete($user->image);
        }
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Deleted failled '],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }



    /**
     * Show the form for editing the specified resource permissions.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edituserpermission(Request $request, user $user)
    {
        $permissions = Permission::where('guard_name', '=', 'user')->get();
        $userPermissions = $user->permissions;
        foreach ($permissions as $permission) {
            $permission->setAttribute('assigned', false);
            foreach ($userPermissions as $userPermission) {
                if ($userPermission->id == $permission->id) {
                    $permission->setAttribute('assigned', true);
                }
            }
        }
        return response()->view('cms.user.user-permissions', ['user' => $user, 'permissions' => $permissions]);
    }



    /**
     * Show the form for editing the specified resource permissions.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateuserpermission(Request $request, user $user)
    {
        $validator = validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id',
        ]);
        if (!$validator->fails()) {
            $permission = Permission::findOrFail($request->input('permission_id'));
            $user->hasPermissionTo($permission)
                ? $user->revokePermissionTo($permission)
                : $user->givePermissionTo($permission);
            return response()->json(["message" => 'permission updated successfully '], Response::HTTP_OK);
        } else {
            return response()->json(["message" => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
