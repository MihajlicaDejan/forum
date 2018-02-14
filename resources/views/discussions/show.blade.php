@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{$discussion->title}}</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">{{$discussion->title}}</h3>
                <span>{{$discussion->user->name}}: <b>({{$discussion->user->points}}) points</b></span>
                @if(Auth::id() == $discussion->user->id)
                    @if(!$discussion->hasBestAnswer())
                        <a href="{{route('discussion.edit', $discussion->slug)}}" class="btn btn-primary btn-xs pull-right">edit</a>
                    @endif
                @endif
                @if($discussion->is_beign_watchd_by_auth_user())
                    <a href="{{route('discussion.unwatch', $discussion->id)}}" class="btn btn-danger btn-xs pull-right">Un-Watch</a>
                @else
                    <a href="{{route('discussion.watch', $discussion->id)}}" class="btn btn-success btn-xs pull-right">Watch</a>
                @endif
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    <img src="{{asset($discussion->user->avatar)}}" width="100px" height="100px" style="border-radius: 50%;" alt="{{$discussion->title}}">
                </div>
                <div class="col-md-8">
                    {!! Markdown::convertToHtml($discussion->body) !!}
                </div>
            </div>
            <hr>
            @if($best_answer)
                <div class="text-center">
                    <h3 class="text-center">Best Answer</h3>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="{{asset($best_answer->user->avatar)}}" width="100px" height="100px" style="border-radius: 50%;" alt="{{$discussion->title}}">
                            <span>{{$best_answer->user->name}} : <b>({{$best_answer->user->points}}) points</b></span>
                        </div>
                        <div class="panel-body">
                            {!! Markdown::convertToHtml($best_answer->body) !!}
                        </div>
                    </div>
                </div>
            @endif
            <div class="panel-footer">
                {{$discussion->replies->count()}} Replies
            </div>
        </div>
    </div>
    @foreach($discussion->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$discussion->title}}
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center">{{$discussion->title}}</h3>
                    <span>{{$reply->user->name}}: <b>({{$reply->user->points}}) points</b></span>
                    @if(!$best_answer)
                        @if(Auth::id() == $discussion->user->id)
                            <a href="{{route('discussion.best.answer', $reply->id)}}" class="btn btn-primary btn-xs pull-right">Mark best answer</a>
                        @endif
                    @endif
                    @if(Auth::id() == $reply->user->id)
                        @if(!$reply->best_answer)
                            <a href="{{route('reply.edit', $reply->id)}}" class="btn btn-primary btn-xs pull-right">Edit</a>
                        @endif
                    @endif
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <img src="{{asset($reply->user->avatar)}}" width="150px" height="150px" alt="{{$discussion->title}}">
                    </div>
                    <div class="col-md-8">
                        {!! Markdown::convertToHtml($reply->body) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    @if($reply->is_like_by_auth_user())
                        <a href="{{route('reply.unlike', $reply->id)}}" class="btn btn-danger">Unlike<span class="badge">{{$reply->likes->count()}}</span></a>
                    @else
                        <a href="{{route('reply.like', $reply->id)}}" class="btn btn-success">Like<span class="badge">{{$reply->likes->count()}}</span></a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <div class="panel panel-default">
        <div class="panel-body">
            @if(Auth::check())
                <form method="post" action="{{route('discussion.reply', $discussion->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="reply">Leave a reply...</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-success">Leave a reply</button>
                    </div>
                </form>
            @else
                <h2 class="text-center">Sing in to leave a reply.</h2>
            @endif
        </div>
    </div>
@endsection