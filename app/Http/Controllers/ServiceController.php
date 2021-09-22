<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Service::select(sprintf('%s*', (new Service())->table));
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
                    <a href="' . route('service.edit',['service'=>$row->id]) . '" class=" text-indigo"><i class="fas fa-edit"></i>  </a>
                    <a   data-id="'. route('service.edit',['service'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions','image_url']);
            return $table->make(true);
        }
        return view('admin.pages.service.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.service.create');
    }

    /**
     * @param \App\Http\Requests\ServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {
        $service = Service::create($request->validated());
        if($request->hasFile('image') ){
            $service->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return $this->sendResponse(null, 'Service crée avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Service $service)
    {
        return view('admin.pages.service.show', compact('service'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        $data = $service;
        return view('admin.pages.service.edit', compact('data'));
    }

    /**
     * @param \App\Http\Requests\ServiceUpdateRequest $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $service->update($request->validated());
        if($request->hasFile('image') ){
            $service->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return $this->sendResponse(null, 'Service modifier avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        $service->delete();
        return $this->sendResponse(null, 'Service supprimer avec succès');
    }
}
