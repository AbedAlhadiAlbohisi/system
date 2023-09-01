<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Sick;
use App\Models\SubCategory;
use App\Models\User;
use App\Notifications\Newsickenotificaion;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SickController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Sick::class, 'sick');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth('admin')->check()) {
            $Sicks = Sick::all();
            return response()->view('cms.Sick.index', ['sick' => $Sicks]);
        } else {
            $Sicks = Sick::where('user_id', '=', auth('user')->id())->get();
            return response()->view('cms.Sick.index', ['sick' => $Sicks]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = category::where('active', '=', true)->get();
        $subcategoties = SubCategory::where('active', '=', true)->get();
        return response()->view('cms.Sick.creat', ['categories' => $categories, 'subcategoties' => $subcategoties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'First_name' => 'required|string|min:3',
            'Last_name' => 'required|string|min:0',
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'Last_name' => 'required|string|min:0',
            'citysike' => 'required|string|min:0',
            'phone' => 'required|string|min:2',
            'city' => 'min:0',
            'ID_namber' => 'required|string|min:2',
            'gender' => 'required|string|in:M,F',
            'danger' => 'nullable|string|in:on',
        ]);

        if (!$validator->fails()) {
            $sick = new Sick();
            $sick->First_name = $request->input('First_name');
            $sick->Last_name = $request->input('Last_name');
            $sick->sub_category_id = $request->input('sub_category_id');
            $sick->phone = $request->input('phone');
            $sick->citysike = $request->input('citysike');
            $sick->city = $request->input('city');
            $sick->ID_namber = $request->input('ID_namber');
            $sick->gender = $request->input('gender');
            $sick->danger = $request->has('danger');

            $isSaved = auth('user')->user()->notes()->save($sick);
            if ($isSaved) {
                $user = User::first();
                $user->notify(new NewUserNotification($user));
            }
            // $isSaved = $sick->save();
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
     * @param  \App\Models\Sick  $sick
     * @return \Illuminate\Http\Response
     */
    public function show(Sick $sick)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sick  $sick
     * @return \Illuminate\Http\Response
     */
    public function edit(Sick $sick)
    {
        // //
        // $categories = category::all();
        // return response()->view('cms.Sick.update', ['sick' => $sick, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sick  $sick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sick $sick)
    {
        //

        $validator = Validator($request->all(), [
            'First_name' => 'required|string|min:3',
            'Last_name' => 'required|string|min:0',
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'phone' => 'required|string|min:2',
            'city' => 'min:0',
            'ID_namber' => 'required|string|min:2',
            'gender' => 'required|string|in:M,F',
            'danger' => 'nullable|string|in:on',


        ]);
        if (!$validator->fails()) {
            $sick->First_name = $request->input('First_name');
            $sick->Last_name = $request->input('Last_name');
            $sick->sub_category_id = $request->input('sub_category_id');
            $sick->phone = $request->input('phone');
            $sick->city = $request->input('city');
            $sick->ID_namber = $request->input('ID_namber');
            $sick->gender = $request->input('gender');
            $sick->danger = $request->has('danger');
            $isSaved = $sick->save();
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
     * @param  \App\Models\Sick  $sick
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sick $sick)
    {
        //
        $deleted = $sick->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Deleted failled '],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
