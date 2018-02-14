<?php

namespace App\Http\Controllers;
use Session;
use App\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{

    public function index()
    {
        $channels = Channel::all();
        return view('channels.index', compact('channels'));
    }


    public function create()
    {
        return view('channels.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'channel' => 'required'
        ]);

        Channel::create([
           'title' => $request->channel,
           'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Channel is created');
        return redirect()->route('channels.index');
    }

    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        return view('channels.edit', compact('channel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'channel' => 'required'
        ]);

        $channel = Channel::findOrFail($id);
        $channel->title = $request->channel;
        $channel->slug  = str_slug($request->title);
        $channel->save();

        Session::flash('success', 'Channel is successfully updated');
        return redirect()->route('channels.index');
    }


    public function destroy($id)
    {
        Channel::destroy($id);

        Session::flash('info', 'Channel is successfully deleted');
        return redirect()->back();
    }
}
