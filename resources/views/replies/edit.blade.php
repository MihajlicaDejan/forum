@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center">Edit Reply</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="{{route('reply.update', $reply->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Answer a question</label>
                    <textarea name="body" class="form-control">{{$reply->body}}></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-control">Update Reply</button>
                </div>
            </form>
        </div>
    </div>
@endsection