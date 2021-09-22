<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::select(sprintf('%s*', (new Post())->table));
            $table = DataTables::of($query);
            $table->addColumn('image_url', function ($row) {
                return sprintf(
                    '<img src="%s" class="img-fluid img-preview rounded">',
                    $row->image_url
                );
            });
            $table->editColumn('statut', function ($row) {
                return $row->statut === 1 ? 'Publier' : 'Non Publier';
            });
            $table->editColumn('created_at', function ($row) {
                return date('H:m d-m-Y', strtotime($row->created_at));
            });
            $table->addColumn('actions', function ($row) {
                return '<div class="text-center">
                    <a href="' . route('post.edit',['post'=>$row->id]) . '" class=" text-indigo"><i class="fas fa-edit"></i>  </a>
                    <a   data-id="'. route('post.edit',['post'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions','image_url']);
            return $table->make(true);
        }
        return view('admin.pages.post.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.post.create');
    }

    /**
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        return $request;
        $post = Post::create($request->validated());
        if($request->hasFile('image') ){
            $post->addMediaFromRequest('image')->toMediaCollection('cover');
        }
        return $this->sendResponse(null, 'Post crée avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('admin.pages.post.show', compact('post'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        $data = $post;
        return view('admin.pages.post.edit', compact('data'));
    }

    /**
     * @param \App\Http\Requests\PostUpdateRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        if($request->hasFile('image') ){
            $post->addMediaFromRequest('image')->toMediaCollection('cover');
        }
        return $this->sendResponse(null, 'Post modifier avec succès');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        return $this->sendResponse(null, 'Post supprimer avec succès');
    }
}
