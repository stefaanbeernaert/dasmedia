<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacaturesRequest;
use App\Models\Type;
use App\Models\Vacature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminVacaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vacatures = Vacature::withTrashed()->paginate(10);
        return view('admin.vacatures.index',compact('vacatures'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::all();
        return view("admin.vacatures.create",compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacaturesRequest $request)
    {
        //
        $vacature = New Vacature();
        $vacature->title = $request->title;
        $vacature->description = $request->description;
        $vacature->company = $request->company;
        $vacature->city = $request->city;
        $vacature->type_id = $request->type;
        $vacature->save();
        Session::flash('vacature_message',$vacature->title . ' was created!');
        return redirect()->back();
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
        $vacature = Vacature::findOrFail($id);
        return view('detail',compact("vacature"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $vacature = Vacature::findOrFail($id);
        return view('admin.vacatures.edit',compact(["vacature","types"]));
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
        $vacature = Vacature::findOrFail($id);
        $vacature->title = $request->title;
        $vacature->description = $request->description;
        $vacature->company = $request->company;
        $vacature->city = $request->city;
        $vacature->type_id = $request->type;
        $vacature->update();
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
        $vacature= Vacature::findOrFail($id);
        $vacature->delete();
        Session::flash('vacature_message', $vacature->title . ' was deleted!');
        return redirect()->back();
    }
    public function restore($id)
    {
        Vacature::onlyTrashed()->where('id', $id)->restore();
        $vacature = Vacature::findOrFail($id);
        Session::flash('city_message', $vacature->title. ' was restored!');
        return redirect()->back();
    }

}
