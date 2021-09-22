<?php

namespace App\Http\Controllers;

use GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneralSettings $settings,Request $request)
    {
        $inputs =  $this->fill($request->all());
        $settings->fill($inputs);
        $settings->save();
        $path_to_tenant = public_path('/');
        ///// upload logo ////
        if ($request->hasFile('logo_512x512')) {
            $fileName =  "favicon.png";
            $logo_512x512 =  "logo_512x512.png";
            $request->logo_512x512->move($path_to_tenant, $fileName);
            File::copy($path_to_tenant."/".$fileName, $path_to_tenant."/".$logo_512x512);
        }
        return $this->sendResponse(null, 'Les donées ont été modifier avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function fill($properties): self
    {
        foreach ($properties as $name => $payload) {
            $this->{$name} = $payload ?? " ";
        }

        return $this;
    }

}
