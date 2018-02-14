@extends('layouts.app')
@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Channels</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($channels as $channel)
                                    <tr>
                                        <td>{{$channel->title}}</td>
                                        <td><a href="{{route('channels.edit', $channel->id)}}" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="{{route('channels.destroy', $channel->id)}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
@endsection