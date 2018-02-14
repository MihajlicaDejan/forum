@extends('layouts.app')
@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">Create new Discussion</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{route('discussions.store')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Channels</label>
                                <select name="channel_id" id="channel_id" class="form-control">
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}">{{$channel->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" class="form-control"{{old('body')}}></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success form-control">Create Discussion</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection