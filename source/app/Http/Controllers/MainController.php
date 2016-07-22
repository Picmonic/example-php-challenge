<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GitHub;
use App\Commit;
use App\Author;

class MainController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {

        return view('welcome');
    }

    public function pull()
    {
        $commits = GitHub::repo()->commits()->all('nodejs', 'node', array('sha' => 'master'));
        $stored_commits = Commit::all();

        foreach ($commits as $commit)
        {
            if (Author::where('email', $commit['commit']['author']['email'])->count() === 0)
            {
                $author = new Author;
                $author->login = $commit['author']['login'];
                $author->email = $commit['commit']['author']['email'];
                $author->name = $commit['commit']['author']['name'];
                $author->save();
            }
            if (count($stored_commits->where('sha', $commit['sha'])) === 0)
            {
                $newcommit = new Commit;
                $newcommit->sha = $commit['sha'];
                $newcommit->author_id = Author::where('login', $commit['author']['login'])->first()->id;
                $newcommit->date = $commit['commit']['committer']['date'];
                $newcommit->message = nl2br($commit['commit']['message']);
                $newcommit->save();
            }
        }
        return redirect('/commits');
    }

    public function commits()
    {
        $commits = Commit::orderBy('date', 'desc')->take(25)->get();
        return view('commits', compact('commits'));
    }

    public function authors()
    {
        $authors = Author::all();
        return view('authors', compact('authors'));
    }

    public function commitsByAuthor($id)
    {
        $commits = Commit::where('author_id', $id)->orderBy('id', 'desc')->take(25)->get();
        return view('commits', compact('commits'));
    }
}
