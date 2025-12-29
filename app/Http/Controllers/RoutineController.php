<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompletedInterval;
use App\Models\Interval;
use App\Models\Routine;
use App\Http\Requests\StoreRoutineRequest;
use App\Http\Requests\UpdateRoutineRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        foreach (Routine::all() as $routine) {
            $interval=$routine->interval;
            if ($interval->repeat==true && $routine->status==0 && date('Y-m-d')<$interval->end_date && $interval->title=='daily') {
                $routine->update(['reminder_date'=>date('Y-m-d')]);
            }
        }

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
        $completeIntervals=CompletedInterval::where('date', '=', date('Y-m-d'))->get();
        return view('user.routines.index', compact('routines','completeIntervals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::where('is_active',1)->get();
        return view('user.routines.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoutineRequest $request)
    {
        $repeat=$request->repeat;
        if ($repeat=='true'){
            $repeat=1;
        }else{
            $repeat=0;
        }
        $user=Auth::id();
        $routine=Routine::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'publish_date'=>date('Y-m-d'),
            'category_id'=>$request->category_id,
            'status'=>false,
            'reminder_date'=>$request->reminder_date,
            'reminder_time'=>$request->reminder_time,
            'user_id'=>$user
        ]);
        if ($routine){
            $interval=Interval::create([
                'title'=>$request->routine_type,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'repeat'=>$repeat,
                'routine_id'=>$routine->id,
            ]);
        }
        if ($interval){
            return redirect()->route('routines.index')->with('success','Routine added successfully');
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        //
    }
    public function status(Routine $routine)
    {
        $interval=$routine->interval->id;
        if ($routine->interval->repeat==false){
            $routine->update(['status'=>true]);
        }
        if ($routine->interval->title=='daily' && $routine->interval->end_date==date('Y-m-d')){
            $routine->update(['status'=>true]);
        }
        if ($routine->interval->title=='weekly' &&  $routine->interval->end_date<Carbon::today()->addDay(7)->format('Y-m-d')){
            $routine->update(['status'=>true]);
        }elseif ($routine->interval->title=='weekly' && $routine->interval->end_date>=Carbon::today()->addDay(7)->format('Y-m-d')){
            $routine->update(['reminder_date'=>Carbon::today()->addDay(7)->format('Y-m-d')]);
        }
        $status=CompletedInterval::create([
            'interval_id'=>$interval,
            'date'=>date('Y-m-d'),
        ]);

        return redirect()->route('routines.index')->with('success','Routine status updated successfully');
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
