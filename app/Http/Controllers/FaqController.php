<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Faq::select(sprintf('%s*', (new Faq())->table));
            $table = DataTables::of($query);
        
            $table->editColumn('statut', function ($row) {
                return $row->statut == 1 ? 'Publier' : 'Non Publier';
            });
            $table->addColumn('actions', function ($row) {
                return '<div class="text-center">
                    <a href="' . route('faq.edit',['faq'=>$row->id]) . '" class=" text-indigo"><i class="fas fa-edit"></i>  </a>
                    <a   data-id="'. route('faq.edit',['faq'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions']);
            return $table->make(true);
        }
        return view('admin.pages.faq.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.faq.create');
    }

    /**
     * @param \App\Http\Requests\FaqStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqStoreRequest $request)
    {
        $faq = Faq::create($request->validated());

        return $this->sendResponse(null, 'Faq crée avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Faq $faq)
    {
        return view('admin.pages.faq.show', compact('faq'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Faq $faq)
    {
        $data = $faq;
        return view('admin.pages.faq.edit', compact('data'));
    }

    /**
     * @param \App\Http\Requests\FaqUpdateRequest $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $faq->update($request->validated());

        return $this->sendResponse(null, 'Faq modifier avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();

        return $this->sendResponse(null, 'Faq supprimer avec succès');
    }
}
