<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Models\SubCategory;
use CreateSubCategoriesTable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(category::class, 'category');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (auth('admin')->check()) {
            $categories = category::withcount('subcategories')->get();
        } else {
            $categories = $request->user()->categories()->withcount('subcategories')->get();
        }

        return response()->view('cms.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(category $category, Request  $request)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|unique:categories|min:3',
            'active' => 'required|boolean',


        ]);
        if (!$validator->fails()) {
            $category = new category();
            $category->name = $request->input('name');
            $category->active = $request->input('active');
            $isSaved = $request->user()->categories()->save($category);
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
        $subcategories = $category->subcategories;
        return response()->json(['subcategories' => $subcategories]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Http\Requests\Request  $request
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
        return response()->view('cms.categories.edite', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $isSaved =   $category->save($request->all());
            $isSaved = $request->user()->categories()->save($category);
            return Response()->json(
                [
                    'message' => $isSaved ? 'created successfully' : 'created failed!'
                ],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ["message" => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
        $deleted = $category->delete();
        return response()->json(
            [
                'message' => $deleted ? 'Deleted successfully' : 'Deleted failled '
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
