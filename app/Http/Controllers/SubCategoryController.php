<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\category;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (auth('admin')->check()) {
            $subCategories = SubCategory::withCount('notes')->get();
        } else {
            $subCategories = SubCategory::withCount('notes')->whereHas('category', function ($query) use ($request) {
                $query->where('user_id', '=', $request->user()->id);
            })->get();
        }
        return response()->view('cms.sub-categories.index', ['subcategories' => $subCategories]);
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
        return response()->view('cms.sub-categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Models\SubCategory  $SubCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubCategory $SubCategory)
    {

        //
        $validator = Validator($request->all(), [
            'category_id' => 'required|numeric|exists:categories,id',
            'name' => 'required|string|unique:sub_categories|min:3',
            'active' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $subCategory = new SubCategory();
            $subCategory->name = $request->input('name');
            $subCategory->active = $request->input('active');
            // $subCategory->category_id = $request->input('category_id');
            // $isSaved = $request->user()->subCategories()->save($SubCategory);
            $subCategory->user_id = $request->user()->id;
            $category = category::findOrFail($request->input('category_id'));
            $isSaved = $category->subcategories()->save($subCategory);

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
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        // try {
        // } catch (Exception $e) {
        //     dd($e);
        // }
        //
        $deleted = $subCategory->delete();
        return response()->json(
            [
                'message' => $deleted ? 'Deleted successfully' : 'Deleted failled '
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
