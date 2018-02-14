@extends('layouts.app')
@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Update Channel</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('channels.update', $channel->id)}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="channel" class="form-control" value="{{$channel->title}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success form-control">Update Channel</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection