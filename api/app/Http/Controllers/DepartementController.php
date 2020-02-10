<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Http\Requests\DepartementRequest;
use Illuminate\Http\Response;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(['data' => Departement::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementRequest $request)
    {
        $departement = new Departement();
        $departement->name = $request->name;
        $departement->store();
        return Response(['data' => $departement], Response::HTTP_CREATED);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(DepartementRequest $request, Departement $departement)
    {
        $departement->name = $request->name;
        $departement->store();
        return Response(['data' => $departement], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return Response::HTTP_NO_CONTENT;
    }
}
