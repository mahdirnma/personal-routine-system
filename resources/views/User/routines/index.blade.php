@extends('layout.app')
@section('title')
    routines
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('routines.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add routine +</a>
                <form action="{{route('routines.index')}}" method="get" class="w-2/4 flex flex-row-reverse justify-center gap-x-7">
                    @csrf
                    <select name="interval_type" id="interval_type" class="w-52 h-10 rounded border pl-2">
                        <option value="all">all</option>
                        <option value="daily">daily</option>
                        <option value="weekly">weekly</option>
                    </select>
                    <button type="submit" class="rounded-2xl w-32 h-10 cursor-pointer bg-gray-200">show</button>
                </form>
                <h2 class="text-xl">routines</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">today status</td>
                        <td class="text-center">totally status</td>
                        <td class="text-center">category</td>
                        <td class="text-center">reminder</td>
                        <td class="text-center">publish date</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($routines as $routine)
                        <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                            <td class="text-center">
                                @if($routine->interval->completedIntervals)
                                    @foreach($routine->interval->completedIntervals as $row)
                                        {{$row->date==date('Y-m-d')?'done':'pending'}}
                                    @endforeach
                                @else
                                    {{'pending'}}
                                @endif
                            </td>
                            <td class="text-center">{{$routine->status?'done':'pending'}}</td>
                            <td class="text-center">{{$routine->category->title}}</td>
                            <td class="text-center">{{$routine->reminder_time}}</td>
                            <td class="text-center">{{$routine->publish_date}}</td>
                            <td class="text-center">{{$routine->description}}</td>
                            <td class="text-center">{{$routine->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{--            <div class="mt-5">{{$routines->links()}}</div>--}}
        </div>
@endsection
