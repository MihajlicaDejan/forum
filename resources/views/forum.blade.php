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
                    <img src="{{asset($discussion->user->avatar)}}" width="100px" height="100px" style="border-radius: 50%;" alt="{{$discussion->title}}">
                </div>
                <div class="col-md-8">
                    {{str_limit($discussion->body, 200)}}
                </div>
            </div>
            <div class="panel-footer">
                <span>
                    {{$discussion->replies->count()}} Replies
                </span>
                <a href="{{route('channel', $discussion->channel->slug)}}" class="pull-right btn btn-warning btn-xs">{{$discussion->channel->title}}</a>
            </div>
        </div>
    @endforeach
    <div class="text-center">
            {{$discussions->links()}}
    </div>
@endsection
