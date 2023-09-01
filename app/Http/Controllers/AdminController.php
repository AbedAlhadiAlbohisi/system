<?php

namespace App\Http\Controllers;

use App\Mail\AdminWelcomeEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Str;

class AdminController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Admin::class, 'admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admincount = Admin::count();
        $admins = Admin::with('roles')->get();
        return response()->view('cms.admins.index', ['admins' => $admins, 'admincount' => $admincount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::where('guard_name', '=', 'admin')->get();
        return response()->view('cms.admins.creat', ['roles' => $roles]);
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

        $validator = validator($request->all(), [
            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins',
            'image' => 'required|image|max:2048|mimes:jpg,png'

        ]);
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            // $admin->password = Hash::make(random_int(0001, 9999));
            $admin->password = Hash::make(12345);
            $randomString = Str::random(10);
            $admin->password = Hash::make($randomString);
            if ($request->hasFile('image')) {
                $imageName = time() . "_admin_image" . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('images', $imageName);
                $admin->image = 'images/' . $imageName;
            }
            $issaved = $admin->save();
            if ($issaved) {
                $admin->assignRole(Role::findOrFail($request->input('role_id')));
                Mail::to($admin)->send(new AdminWelcomeEmail($admin, $randomString));
                // Mail::to($admin)->queue(new AdminWelcomeEmail($admin, $randomString));
                // Mail::to($admin)->later(5, new AdminWelcomeEmail($admin, $randomString));
            }
            return response()->json(
                ['message' => $issaved ? 'Admin created successfully' : 'Admin created failed'],
                $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST

            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
        dd("delete");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        $roles = Role::where('guard_name', '=', 'admin')->get();
        $adminRole = $admin->roles[0];
        return response()->view('cms.admins.update', ['admin' => $admin, 'roles' => $roles, 'adminRole' => $adminRole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins',
            'image' => 'nullable|image|max:2048|mimes:jpg,png',



        ]);
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
        ]);
        if (!$validator->fails()) {
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            if ($request->hasFile('image')) {
                Storage::delete($admin->image);
                $imageName = time() . "_admin_image" . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('images', $imageName);
                $admin->image = 'images/' . $imageName;
            }
            $issaved = $admin->save();
            if ($issaved) $admin->syncRoles(Role::findOrFail($request->input('role_id')));
            return response()->json(
                ['message' => $issaved ? 'Admin updated successfully' : 'Admin update failed'],
                $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST

            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        if (auth('admin')->id() != $admin->id) {
            $deleted = $admin->delete();
            return response()->json(
                ['message' => $deleted ? 'Deleted successfully' : 'Deleted failled '],
                $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' =>  'Can\'t dleste your Acoount '],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
