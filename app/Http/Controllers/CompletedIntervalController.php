<?php

namespace App\Http\Controllers;

use App\Models\CompletedInterval;
use App\Http\Requests\StoreCompletedIntervalRequest;
use App\Http\Requests\UpdateCompletedIntervalRequest;

class CompletedIntervalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $completedIntervals = CompletedInterval::where('date',date('Y-m-d'))->get();
        return view('user.completed-intervals.index',compact('completedIntervals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompletedIntervalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompletedInterval $completedInterval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompletedInterval $completedInterval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompletedIntervalRequest $request, CompletedInterval $completedInterval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompletedInterval $completedInterval)
    {
        //
    }
}
