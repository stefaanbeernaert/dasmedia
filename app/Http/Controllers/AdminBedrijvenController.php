<?php

namespace App\Http\Controllers;

use App\Models\Vacature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminBedrijvenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bedrijven = Vacature::withTrashed()->paginate(15);

        return view('admin.bedrijven.index',compact('bedrijven'));
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
        //
        $bedrijf = Vacature::findOrFail($id);
        return view('admin.bedrijven.edit',compact("bedrijf"));

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
        $bedrijf = Vacature::findOrFail($id);
        $bedrijf->company = $request->name;
        $bedrijf->update();
        return redirect('/admin/bedrijven');
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
        $bedrijf = Vacature::findOrFail($id);
        $bedrijf->delete();
        Session::flash('bedrijf_message', $bedrijf->company . ' was deleted!');
        return redirect()->back();
    }
    public function restore($id)
    {
        Vacature::onlyTrashed()->where('id', $id)->restore();
        $bedrijf = Vacature::findOrFail($id);
        Session::flash('bedrijf_message', $bedrijf->company. ' was restored!');
        return redirect()->back();
    }
}
