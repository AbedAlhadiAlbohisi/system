<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
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
            $notes = Note::with('subcategory')->get();
            return response()->view('cms.notes.index', ['notes' => $notes]);
        } else {
            $notes = auth('user')->User()->notes()->with('subcategory')->get();
            return response()->view('cms.notes.index', ['notes' => $notes]);
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
        return response()->view('cms.notes.create', ['categories' => $categories]);
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
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'name' => 'required|string|min:3',
            'title' => 'required|string|min:3',
            'info' => 'required|string|min:3',
            'done' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $note = new Note();
            $note->sub_category_id = $request->input('sub_category_id');
            $note->name = $request->input('name');
            $note->title = $request->input('title');
            $note->info = $request->input('info');
            $note->done = $request->input('done');
            $issaved = auth('user')->user()->notes()->save($note);
            return response()->json(
                ['message' => $issaved ? __('messages.create_succ') : __('messages.create_failedسسس')],
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
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
        return response()->view('cms.notes.edite', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
        $validator = validator($request->all(), [
            'title' => 'required|string|min:3',
            'info' => 'required|string|min:3',
            'Name' => 'required|string|min:3',
            'done' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            // $note->title = $request->input('title');
            // $note->Name = $request->input('Name');
            // $note->info = $request->input('info');
            // $note->done = $request->input('done');
            // $issaved = $note->save();

            $issaved = $note->update($request->all());

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
        $deleted = $note->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Deleted failled '],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
