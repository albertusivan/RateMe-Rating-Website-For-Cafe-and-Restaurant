<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cafe;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate(['cafe_id' => 'required']);

        if ($request) {
            $comment = comment::where('cafe_id', '=', $request->cafe_id)->get();
        } else {
            return response([
                'message' => 'No comments'
            ], 403);
        }

        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "list" => $comment,
        ]);

        return view('cafe.index', compact('cafe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $attrs = $request->validate([
            'user_id' => 'required',
            'cafe_id' => 'required',
            'content' => 'required',
        ]);

        $comment = Comment::create([
            'user_id' => $attrs['user_id'],
            'cafe_id' => $attrs['cafe_id'],
            'content' => $attrs['content'],
        ]);
        if (request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "message" => $comment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cafe $cafe)
    {
        $request->validate(['comment' => 'required']);
        // Comment::create($request->comment);

        Comment::create([
            'user_id' => Auth::user()->id,
            'cafe_id' => $cafe->id,
            'content' => $request->comment,
        ]);

        return redirect()->route('cafe.edit', $cafe->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
