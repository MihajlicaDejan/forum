<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Discussion;
use App\Reply;
use App\User;
use App\Watcher;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public function create()
    {
        return view('discuss');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
         'title'      => 'required',
         'channel_id' => 'required',
         'body'       => 'required'
      ]);

      $discussion = Discussion::create([
         'title'      => $request->title,
         'body'       => $request->body,
         'channel_id' => $request->channel_id,
         'user_id'    => Auth::id(),
         'slug'       => str_slug($request->title)
      ]);

      $discussion->save();

      Session::flash('success', 'Discussion is create');
      return redirect()->route('discussion', $discussion->slug);
    }

    public function edit($slug)
    {
        return view('discussions.edit', ['discussion' => Discussion::where('slug', $slug)->first()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $discussion = Discussion::findOrFail($id);
        $discussion->body = $request->body;
        $discussion->save();

        Session::flash('success', 'You are successfuly updated your disscussion');
        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }

    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show', compact('discussion','best_answer'));
    }

    public function reply(Request $request,$id)
    {
        $discussion = Discussion::findOrFail($id);

        $reply = Reply::create([
            'user_id'       => Auth::id(),
            'discussion_id' => $id,
            'body'          => $request->body
        ]);

        $reply->user->points += 25;
        $reply->user->save();

        $watchers = array();

        foreach($discussion->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

        Session::flash('success', 'Replied to discussion.');
        return redirect()->back();
    }
}
