@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center">Edit Discussion</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="{{route('discussion.update', $discussion->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" class="form-control">{{$discussion->body}}></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-control">Update Discussion</button>
                </div>
            </form>
        </div>
    </div>
@endsection