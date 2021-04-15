<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Blog;
use DB;
use App\Tag;
use App\Slide;



class BlogController extends Controller

{

    public function showPost()

    {

        $posts = Blog::where('status', 'LIKE', 'PUBLISHED')->orderBy('id', 'DESC')->paginate(4);
        $new_post = Blog::where('status', 'LIKE', 'PUBLISHED')->orderBy('id', 'DESC')->take(4)->get();
        $tag = Tag::all();
        return view('blogs.archivePost', compact('posts', 'new_post', 'tag'));
    }

    public function getPost(Request $req)

    {

        $post = Blog::where('slug', 'LIKE', $req->id)->first();
        $tag = Tag::all();

        return view('blogs.detailPost', compact('post', 'tag'));
    }
    public function getTag(Request $req)

    {

        $posts = Blog::where('tag', $req->id)->paginate(4);
        $new_post = Blog::where('status', 'LIKE', 'PUBLISHED')->orderBy('id', 'DESC')->take(4)->get();
        $tag = Tag::all();
        return view('blogs.archivePost', compact('posts', 'new_post', 'tag'));
    }
    public function showCategory(Request $req)
    {
        if ($req->id == 'goc-am-thuc') {
            $posts = Blog::where('category_id', 3)->orderBy('id', 'DESC')->paginate(6);
        } else {
            $posts = Blog::where('category_id', 4)->orderBy('id', 'DESC')->paginate(6);
        }
        $tag = Tag::all();
        $new_post = Blog::where('status', 'LIKE', 'PUBLISHED')->orderBy('id', 'DESC')->take(4)->get();

        return view('blogs.archivePost', compact('posts', 'new_post', 'tag'));
    }
}
