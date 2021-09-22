<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneStoreRequest;
use App\Http\Requests\PhoneUpdateRequest;
use App\Models\Phone;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends AppBaseController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Phone::select(sprintf('%s*', (new Phone())->table));
            $table = DataTables::of($query);
            $table->addColumn('image_url', function ($row) {
                return sprintf(
                    '<img src="%s" class="img-fluid img-preview rounded">',
                    $row->image_url
                );
            });
            $table->editColumn('created_at', function ($row) {
                return date('H:m d-m-Y', strtotime($row->created_at));
            });
            $table->addColumn('actions', function ($row) {
                return '
                <div class="text-center">
                    <a href="' . route('phone.edit',['phone'=>$row->id]) . '" class=" text-indigo"><i class="fas fa-edit"></i>  </a>
                    <a   data-id="'. route('phone.edit',['phone'=>$row->id]) .'" class=" text-danger deleteButton"><i class="fas fa-trash-alt"></i> </a>
                </div>';
            });
            $table->rawColumns(['actions','image_url']);
            return $table->make(true);
        }
        return view('admin.pages.phone.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.phone.create');
    }

    /**
     * @param \App\Http\Requests\PhoneStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneStoreRequest $request)
    {
        $phone = Phone::create($request->validated());
        if($request->hasFile('image') ){
            $phone->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return $this->sendResponse(null, 'Phone crée avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Phone $phone)
    {
        return view('admin.pages.phone.show', compact('phone'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Phone $phone)
    {
        $data = $phone;
        return view('admin.pages.phone.edit', compact('data'));
    }

    /**
     * @param \App\Http\Requests\PhoneUpdateRequest $request
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneUpdateRequest $request, Phone $phone)
    {
        $phone->update($request->validated());
        if($request->hasFile('image') ){
            $phone->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return $this->sendResponse(null, 'Phone modifier avec succès');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Phone $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Phone $phone)
    {
        $phone->delete();
        return $this->sendResponse(null, 'Phone suprimer avec succès');
    }
}
