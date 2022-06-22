<?php

namespace App\Http\Controllers;

use App\Models\Vacature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminStedenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Vacature::withTrashed()->paginate(15);

        return view('admin.steden.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Vacature::findOrFail($id);
        return view('admin.steden.edit',compact("city"));
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
        $city = Vacature::findOrFail($id);
        $city->city = $request->name;
        $city->update();
        return redirect('/admin/steden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Vacature::findOrFail($id);
        $city->delete();
        Session::flash('city_message', $city->city . ' was deleted!');
        return redirect()->back();
    }
    public function restore($id)
    {
        Vacature::onlyTrashed()->where('id', $id)->restore();
        $bedrijf = Vacature::findOrFail($id);
        Session::flash('city_message', $bedrijf->city. ' was restored!');
        return redirect()->back();
    }
}
