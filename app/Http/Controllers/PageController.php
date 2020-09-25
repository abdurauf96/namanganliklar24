<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
class PageController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('more')){
            $latest_posts=Post::withTranslation(\App::getLocale())
            ->latest()
            ->limit(20)
            ->get();
        }else{
            $latest_posts=Post::withTranslation(\App::getLocale())
            ->latest()
            ->limit(10)
            ->get();
        }

        $posts=Post::withTranslation(\App::getLocale())
        ->where('featured',1)
        ->latest()
        ->limit(6)
        ->get();
        
       
        return view('welcome', compact('posts', 'latest_posts'));
    }

    public function page($slug)
    {
        $page=\App\Page::whereTranslation('slug', $slug, [\App::getLocale()])
        ->withTranslation(\App::getLocale())
        ->first();
        return view('page', compact('page'));
    }

    public function postsByTag($id)
    {
        $tag=Tag::findOrFail($id);
        $posts=$tag->posts()->latest()->paginate(10);
        
        return view('posts', compact('posts', 'tag'));
    }

    public function posts($slug)
    { 
        $category=Category::where('slug', $slug)->withTranslation(\App::getLocale())->first();
        $posts=Post::where('category_id', $category->id)
        ->withTranslation(\App::getLocale())
        ->latest()
        ->paginate(10);
        return view('posts', compact('category', 'posts'));
    } 

    public function viewPost($id)
    {
        $post=Post::withTranslation(\App::getLocale())->with('tags')->findOrFail($id);
        $post->view=$post->view+1;
        $post->save();

        $related = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name')); 
        })
        ->where('id', '!=', $post->id)
        ->limit(3)
        ->get();
        
        return view('view_post', compact('post', 'related'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function search(Request $request)
    {
        $q=$request->q;
        $posts=Post::whereTranslation('title', 'like', '%'.$q.'%', [\App::getLocale()])
        ->orWhere(function ($query) use ($q) {
           $query->whereTranslation('excerpt', 'like', '%'.$q.'%', [\App::getLocale()]);
        })
        ->orWhere(function ($query) use ($q) {
           $query->whereTranslation('body', 'like', '%'.$q.'%', [\App::getLocale()]);
        })
        ->get();
        
        return view('search', compact('posts'));
    }

    public function storeMessage(Request $request)
    {
        
        if($request->kod!=$request->input_kod){
            return back()->with('error_msg', 'Kodni to`g`ri kiriting!');
        }else{

            $message=new Message();
            $message->name=$request->name;
            $message->phone=$request->phone;
            $message->email=$request->email;
            $message->title=$request->theme;
            $message->body=$request->text;
            
            if($request->file('file')){
                $file=$request->file('file');
                $filename=$file->getClientOriginalName();
                $path='files';
                $file->move($path,$filename);
                $message->file=$filename;
            };
            $message->save();

            $apiToken = "768420781:AAEzzh0nDnr3o067TNOBnafxm1QTe4fbilo";
        $message=<<<TEXT
        Yangi murojat:
        Phone: {$request->phone},
        Name: {$request->name},
        Email: {$request->email},
        Mavzu: {$request->theme},
        Murojat matni: {$request->text},
TEXT;

        $data = [
            'chat_id' => '-1001275166205',
            'text' => $message
        ];

        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

            return back()->with('flash', 'Success!');
        }
    }
}
