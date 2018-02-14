@extends('layouts.app')
@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Create Channel</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('channels.store')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="channel" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success form-control">Create Channel</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection