<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Http\Requests\EmployeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortValues = ['id', 'firstName', 'lastName', 'email'];
        $validator = Validator::make($request->all(), [
            'paginate' => 'integer|min:1',
            'sort' => ['min:1|max:100', Rule::in($sortValues)]
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $paginate = $request->input('paginate', 10);
        $sort = $request->input('sort', 'id');
        $sortDiretion = $request->input('sortDir') == 'desc' ? 'desc' : 'asc';

        $employes = Employe::orderBy($sort, $sortDiretion)->paginate($paginate);

        return response()->json($employes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        $employe = new Employe();
        $employe->firstName = $request->firstName;
        $employe->lastName = $request->lastName;
        $employe->email = $request->email;
        $employe->job_id = $request->job_id;
        $employe->departement_id = $request->departement_id;

        $employe->save();

        return response([
            'data' => $employe
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeRequest $request, Employe $employe)
    {
        $employe->firstName = $request->firstName;
        $employe->lasName = $request->lasName;
        $employe->email = $request->email;
        $employe->job_id = $request->job_id;
        $employe->departement_id = $request->departement_id;

        $employe->save();

        return response([
            'data' => $employe
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return response(Response::HTTP_ACCEPTED);
    }
}
