<?php

namespace App\Http\Controllers;

use App\Exports\IdeasExport;
use App\Mail\NotifyMail;
use App\Mail\SendQACoodinatorMail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\IdeaDetail;
use App\Models\IdeaDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use File;
use ZipArchive;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ideas = Idea::latest()->paginate(5);

        $results = DB::select('SELECT id.*,u.name, IFNULL(like_tbl.like_number, 0) as like_number, IFNULL(dislike_tbl.dislike_number, 0) as dislike_number FROM ideas  id
                                        LEFT JOIN
                                            (SELECT idea_id, like_or_dislike ,count(*) like_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 1
                                            GROUP BY idea_id) like_tbl ON id.id = like_tbl.idea_id
                                        LEFT JOIN
                                            (
                                            SELECT idea_id, like_or_dislike ,count(*) dislike_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 2
                                            GROUP BY idea_id) dislike_tbl ON id.id = dislike_tbl.idea_id
                                        LEFT JOIN users u ON id.created_by = u.id
                                    WHERE id.category_id = ?
                                    ORDER BY id.id desc
                                ', [Auth::user()->category_id]);

//        $collect = collect($results);
//        dd($collect);
//        dd($collect);
        foreach ($results as $item) {
            $item->comments = Comment::where('idea_id', $item->id)->get();
            $item->documents = IdeaDocument::where('idea_id', $item->id)->get();
            $item->like_or_dislike = IdeaDetail::where([
                    ['idea_id', '=', $item->id],
                    ['user_id', '=', Auth::id()]
                ])->first()->like_or_dislike ?? null;
        }
        $ideas = $this->arrayPaginator($results, $request);
//        $ideas = new LengthAwarePaginator(
//            $collect->forPage(request()->input('page', 1), 5),
//            $collect->count(),
//            5,
//            request()->input('page', 1)
//        );
        $result = view('ideas.index', compact('ideas'));
//        if(request()->input('id')) {
//            $result-> with('user', User::find(request()->input('id')));
////            dd(User::find(request()->input('id')));
//        }
        return $result;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPopular(Request $request)
    {


        if (Auth::user()->type == 1) {
            $results = DB::select('SELECT id.*,u.name, IFNULL(like_tbl.like_number, 0) as like_number, IFNULL(dislike_tbl.dislike_number, 0) as dislike_number FROM ideas  id
                                        LEFT JOIN
                                            (SELECT idea_id, like_or_dislike ,count(*) like_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 1
                                            GROUP BY idea_id) like_tbl ON id.id = like_tbl.idea_id
                                        LEFT JOIN
                                            (
                                            SELECT idea_id, like_or_dislike ,count(*) dislike_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 2
                                            GROUP BY idea_id) dislike_tbl ON id.id = dislike_tbl.idea_id
                                        LEFT JOIN users u ON id.created_by = u.id
                                    ORDER BY (IFNULL(like_tbl.like_number, 0) - IFNULL(dislike_tbl.dislike_number, 0)) desc
                                ');
        } else {
            $results = DB::select('SELECT id.*,u.name, IFNULL(like_tbl.like_number, 0) as like_number, IFNULL(dislike_tbl.dislike_number, 0) as dislike_number FROM ideas  id
                                        LEFT JOIN
                                            (SELECT idea_id, like_or_dislike ,count(*) like_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 1
                                            GROUP BY idea_id) like_tbl ON id.id = like_tbl.idea_id
                                        LEFT JOIN
                                            (
                                            SELECT idea_id, like_or_dislike ,count(*) dislike_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 2
                                            GROUP BY idea_id) dislike_tbl ON id.id = dislike_tbl.idea_id
                                        LEFT JOIN users u ON id.created_by = u.id
                                    WHERE id.category_id = ?
                                    ORDER BY (IFNULL(like_tbl.like_number, 0) - IFNULL(dislike_tbl.dislike_number, 0)) desc
                                ', [Auth::user()->category_id]);
        }
        foreach ($results as $item) {
            $item->comments = Comment::where('idea_id', $item->id)->get();
            $item->documents = IdeaDocument::where('idea_id', $item->id)->get();
            $item->like_or_dislike = IdeaDetail::where([
                    ['idea_id', '=', $item->id],
                    ['user_id', '=', Auth::id()]
                ])->first()->like_or_dislike ?? null;
        }
        $ideas = $this->arrayPaginator($results, $request);

//        $result = view('ideas.index', compact('ideas'));

        return view('ideas.indexPopular', compact('ideas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLastest(Request $request)
    {


        if (Auth::user()->type == 1) {
            $results = DB::select('SELECT id.*,u.name, IFNULL(like_tbl.like_number, 0) as like_number, IFNULL(dislike_tbl.dislike_number, 0) as dislike_number FROM ideas  id
                                        LEFT JOIN
                                            (SELECT idea_id, like_or_dislike ,count(*) like_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 1
                                            GROUP BY idea_id) like_tbl ON id.id = like_tbl.idea_id
                                        LEFT JOIN
                                            (
                                            SELECT idea_id, like_or_dislike ,count(*) dislike_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 2
                                            GROUP BY idea_id) dislike_tbl ON id.id = dislike_tbl.idea_id
                                        LEFT JOIN users u ON id.created_by = u.id
                                    ORDER BY  id.id desc
                                ');
        } else {
            $results = DB::select('SELECT id.*,u.name, IFNULL(like_tbl.like_number, 0) as like_number, IFNULL(dislike_tbl.dislike_number, 0) as dislike_number FROM ideas  id
                                        LEFT JOIN
                                            (SELECT idea_id, like_or_dislike ,count(*) like_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 1
                                            GROUP BY idea_id) like_tbl ON id.id = like_tbl.idea_id
                                        LEFT JOIN
                                            (
                                            SELECT idea_id, like_or_dislike ,count(*) dislike_number FROM web_idea.ideas_detail
                                            WHERE like_or_dislike = 2
                                            GROUP BY idea_id) dislike_tbl ON id.id = dislike_tbl.idea_id
                                        LEFT JOIN users u ON id.created_by = u.id
                                    WHERE id.category_id = ?
                                    ORDER BY id.id desc
                                ', [Auth::user()->category_id]);
        }
        foreach ($results as $item) {
            $item->comments = Comment::where('idea_id', $item->id)->get();
            $item->documents = IdeaDocument::where('idea_id', $item->id)->get();
            $item->like_or_dislike = IdeaDetail::where([
                    ['idea_id', '=', $item->id],
                    ['user_id', '=', Auth::id()]
                ])->first()->like_or_dislike ?? null;
        }
        $ideas = $this->arrayPaginator($results, $request);

//        $result = view('ideas.index', compact('ideas'));

        return view('ideas.indexPopular', compact('ideas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexComments(Request $request)
    {


        if (Auth::user()->type == 1) {
            $results = DB::select('SELECT c.*, u.name, i.title FROM web_idea.comments c
                                            left join users u on c.created_by = u.id
                                            left join ideas i on i.id = c.idea_id
                                            left join category cat on u.category_id = cat.id
                                    ORDER BY c.id desc
                                ');
        } else {
            $results = DB::select('SELECT c.*, u.name, i.title FROM web_idea.comments c
                                            left join users u on c.created_by = u.id
                                            left join ideas i on i.id = c.idea_id
                                            left join category cat on u.category_id = cat.id
                                            WHERE cat.id = ?
                                    ORDER BY c.id desc
                                ', [Auth::user()->category_id]);
        }
//        foreach ($results as $item) {
//            $item->comments = Comment::where('idea_id', $item->id)->get();
//            $item->documents = IdeaDocument::where('idea_id', $item->id)->get();
//            $item->like_or_dislike = IdeaDetail::where([
//                    ['idea_id', '=', $item->id],
//                    ['user_id', '=', Auth::id()]
//                ])->first()->like_or_dislike ?? null;
//        }
        $ideas = $this->arrayPaginator($results, $request);

//        $result = view('ideas.index', compact('ideas'));

        return view('ideas.indexComment', compact('ideas'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = request()->input('page', 1);
        $perPage = 5;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $request->merge([
            'category_id' => Auth::user()->category_id,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);

        $check = true;
        if ($request->has('images')) {
            $allowedfileExtension = ['pdf', 'docx'];

            foreach ($request->images as $image) {
//                $imageName = now()->getTimestampMs() + $idea->id . '.' . $image->getClientOriginalExtension();

                $check = in_array($image->getClientOriginalExtension(), $allowedfileExtension);
                if (!$check) {
                    break;
                }


//                $request->merge([
//                    'file_dinh_kem' => $imageName
//                ]);
            }
//

        }

        if ($check) {
            $request->merge([
                'is_anonymously' => $request->get('is_anonymously') ? 1 : 0
            ]);
            $idea = Idea::create($request->all());
            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $imageName = now()->getTimestampMs() + $idea->id . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('images'), $imageName);
                    IdeaDocument::create([
                        'file_name' => $imageName,
                        'idea_id' => $idea->id
                    ]);

                }
            }


        } else {
            return redirect()->route('ideas.index')
                ->with('failed', 'Document only accesss Word or PDF File');
        }
        $users = User::where([
            ['category_id', '=', Auth::user()->category_id],
            ['type', '=', 3]
        ])->get();
//        dd($users);
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendQACoodinatorMail());
        }

        return redirect()->route('ideas.index')
            ->with('success', 'Create Idea Success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new IdeasExport(), 'ideas.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function downloadZip()
    {
        $zip = new ZipArchive();

        $fileName = 'MyDocument.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('images'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}
