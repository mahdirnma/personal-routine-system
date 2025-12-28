<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Http\Requests\StoreRoutineRequest;
use App\Http\Requests\UpdateRoutineRequest;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $routines2 = Routine::where('reminder_date', '=', date('Y-m-d'))->get();
        $routines=[];
        if ($request->interval_type && $request->interval_type!='all'){
            foreach ($routines2 as $routine){
                if ($routine->interval->title==$request->interval_type){
                    array_push($routines,$routine);
                }
            }
        }else{
            foreach ($routines2 as $routine){
                array_push($routines,$routine);
            }
        }
        return view('user.routines.index', compact('routines'));
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
    public function store(StoreRoutineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoutineRequest $request, Routine $routine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routine $routine)
    {
        //
    }
}
