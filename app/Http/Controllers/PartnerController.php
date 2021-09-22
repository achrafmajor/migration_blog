<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Partner::select(sprintf('%s*', (new Partner())->table));
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
        return view('admin.pages.partner.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.partner.create');
    }

    /**
     * @param \App\Http\Requests\PartnerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerStoreRequest $request)
    {
        $partner = Partner::create($request->validated());
        if($request->hasFile('image') ){
            $partner->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return $this->sendResponse(null, 'Partner crée avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Partner $partner)
    {
        return view('admin.pages.partner.show', compact('partner'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Partner $partner)
    {
        return view('admin.pages.partner.edit', compact('partner'));
    }

    /**
     * @param \App\Http\Requests\PartnerUpdateRequest $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerUpdateRequest $request, Partner $partner)
    {
        $partner->update($request->validated());
        if($request->hasFile('image') ){
            $partner->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return $this->sendResponse(null, 'Partner modifier avec succès');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Partner $partner)
    {
        $partner->delete();
        return $this->sendResponse(null, 'Partner supprimer avec succès');
    }
}
