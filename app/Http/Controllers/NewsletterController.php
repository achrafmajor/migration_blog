<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterStoreRequest;
use App\Http\Requests\NewsletterUpdateRequest;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsletterController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Newsletter::select(sprintf('%s*', (new Newsletter())->table));
            $table = DataTables::of($query);
            $table->editColumn('created_at', function ($row) {
                return date('H:m d-m-Y', strtotime($row->created_at));
            });
            $table->addColumn('actions', function ($row) {
                return '<div class="text-center">
                    <a   data-id="'. route('newsletter.edit',['newsletter'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions','image_url']);
            return $table->make(true);
        }
        return view('admin.pages.newsletter.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.newsletter.create');
    }

    /**
     * @param \App\Http\Requests\NewsletterStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterStoreRequest $request)
    {
        $newsletter = Newsletter::create($request->validated());

        return redirect()->route('admin.pages.newsletter.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Newsletter $newsletter)
    {
        return view('admin.pages.newsletter.show', compact('newsletter'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Newsletter $newsletter)
    {
        return view('admin.pages.newsletter.edit', compact('newsletter'));
    }

    /**
     * @param \App\Http\Requests\NewsletterUpdateRequest $request
     * @param \App\Models\Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(NewsletterUpdateRequest $request, Newsletter $newsletter)
    {
        $newsletter->update($request->validated());
        return redirect()->route('admin.pages.newsletter.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.pages.newsletter.index');
    }
}
