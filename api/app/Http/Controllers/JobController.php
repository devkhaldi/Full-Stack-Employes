<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Job;
use Illuminate\Http\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Job::all()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $job = new Job();
        $job->title = $request->title;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;

        return Response([
            'data' => $job
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $job->title = $request->title;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;

        return Response([
            'data' => $job
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return Response::HTTP_NO_CONTENT;
    }
}
