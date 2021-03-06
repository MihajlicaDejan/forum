<?php

namespace App\Http\Controllers;
use Session;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([
           'reply_id' => $id,
           'user_id'  => Auth::id()
        ]);

        Session::flash('success', 'You liked the reply');
        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        Session::flash('success', 'You dont like this reply anymore');
        return redirect()->back();
    }

    public function best_answer($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->best_answer = 1;

        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();

        Session::flash('success', 'Reply has been marked as the best answer');
        return redirect()->back();
    }

    public function edit($id)
    {
        $reply = Reply::findOrFail($id);
        return view('replies.edit', compact('reply'));
    }

    public function update($id)
    {
        $this->validate(request(),[
            'body' => 'required'
        ]);

        $reply = Reply::findOrFail($id);
        $reply->body = request()->body;
        $reply->save();

        Session::flash('success', 'Reply is updated');
        return redirect()->route('discussion', ['slug' => $reply->discussion->slug]);
    }
}
