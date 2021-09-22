<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PageController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Page::select(sprintf('%s*', (new Page())->table));
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
                    <a href="' . route('page.edit',['page'=>$row->id]) . '" class=" text-indigo"><i class="fas fa-edit"></i>  </a>
                    <a   data-id="'. route('page.edit',['page'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions','image_url']);
            return $table->make(true);
        }
        return view('admin.pages.page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.page.create');
    }


    /**
     * @param \App\Http\Requests\PageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $page = Page::create($request->validated());
        if($request->hasFile('image') ){
            $page->addMediaFromRequest('image')->toMediaCollection('cover');
        }
        return $this->sendResponse(null, 'Page crée avec succès');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        return view('admin.pages.page.show', compact('page'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Page $page)
    {
        $data = $page;
        return view('admin.pages.page.edit', compact('data'));
    }

    /**
     * @param \App\Http\Requests\PageUpdateRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->update($request->validated());
        if($request->hasFile('image') ){
            $page->addMediaFromRequest('image')->toMediaCollection('cover');
        }
        return $this->sendResponse(null, 'Page modifier avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();
        return $this->sendResponse(null, 'Page supprimer avec succès');
    }
}
