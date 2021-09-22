<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStoreRequest;
use App\Http\Requests\FeedbackUpdateRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeedbackController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Feedback::select(sprintf('%s*', (new Feedback())->table));
            $table = DataTables::of($query);
            $table->addColumn('actions', function ($row) {
                return '<div class="text-center">
                    <a href="' . route('feedback.edit',['feedback'=>$row->id]) . '" class=" text-indigo"><i class="fas fa-edit"></i>  </a>
                    <a   data-id="'. route('feedback.edit',['feedback'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions']);
            return $table->make(true);
        }
        return view('admin.pages.feedback.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.feedback.create');
    }

    /**
     * @param \App\Http\Requests\FeedbackStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackStoreRequest $request)
    {
        $feedback = Feedback::create($request->validated());

        return $this->sendResponse(null, 'Feedback crée avec succès');    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Feedback $feedback)
    {
        return view('admin.pages.feedback.show', compact('feedback'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Feedback $feedback)
    {
        $data = $feedback;
        return view('admin.pages.feedback.edit', compact('data'));
    }

    /**
     * @param \App\Http\Requests\FeedbackUpdateRequest $request
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackUpdateRequest $request, Feedback $feedback)
    {
        $feedback->update($request->validated());
        return $this->sendResponse(null, 'Page modifier avec succès');  
      }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Feedback $feedback)
    {
        $feedback->delete();

        return $this->sendResponse(null, 'Page supprimer avec succès');    }
}
