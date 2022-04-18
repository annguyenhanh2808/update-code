<?php

namespace App\Http\Controllers;

use App\Models\IdeaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaDetailController extends Controller
{
    //

    public function like($id) {

        IdeaDetail::updateOrCreate(
            ['idea_id' => $id, 'user_id' => Auth::id()],
            ['like_or_dislike' => 1]
        );
        return redirect()->route('ideas.index');
    }

    public function dislike($id) {
//        dd($request->all());
        IdeaDetail::updateOrCreate(
            ['idea_id' => $id, 'user_id' => Auth::id()],
            ['like_or_dislike' => 2]
        );
        return redirect()->route('ideas.index');
    }
}
