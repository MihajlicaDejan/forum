@extends('layouts.app')
@section('content')
    @foreach($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">{{$discussion->title}}</h3>
                <span>{{$discussion->user->name}}: <b>{{$discussion->created_at->diffForHumans()}}</b></span>
                @if($discussion->hasBestAnswer())
                    <span class="btn btn-success btn-xs pull-right">have best answer</span>
                @else
                    <span class="btn btn-danger btn-xs pull-right">have not a best answer</span>
                @endif
                <a href="{{route('discussion', $discussion->slug)}}" class="btn btn-primary btn-xs pull-right">View</a>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    <img src="{{asset($discussion->user->avatar)}}" width="150px" height="150px" alt="{{$discussion->title}}">
                </div>
                <div class="col-md-8">
                    {{str_limit($discussion->body, 200)}}
                </div>
            </div>
            <div class="panel-footer">
                {{$discussion->replies->count()}} Replies
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {{$discussions->links()}}
    </div>
@endsection