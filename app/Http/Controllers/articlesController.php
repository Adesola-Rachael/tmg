<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
 

use Auth;
use Image;
use App\Models\article;
use App\Models\comment; 
use App\Models\article_category;
use App\Models\article_author;
use DB;

class articlesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user= Auth::user();
        $pageName='Articles';
        $pageTitle='tmgr | manage articles';
        $articles =article::orderBy('created_at','asc')->get();
        $authors = article_author::orderBy('created_at','asc')->get();
        $cats= article_category::orderBy('created_at','asc')->get();

        // $cat=articleCategory::find($id)->cat;
        // $category=article::where('articleCategory_id',$id);
        return view('cube/manage_articles',compact('authors','pageName','pageTitle','user','cats','articles'));
    }    
    public function create(Request $request)
    {
    	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				 
         $this->validate($request,[
            'article_title'=>'required',
            'article_desc'=>'required',
            'category'=>'required',
            'author'=>'required',
            'image'=>'required|mimes:jpg,png,svg'
        ]);
        // $category=articleCategory::find($id);
        // $author=article_author::find($id);
        $article = new article();
        $article->article_id ='articles-'.substr(str_shuffle($permitted_chars), 0, 16);
        $article->article_title=$request->article_title;
        $article->article_desc=$request->article_desc;
        $article->article_category_id=$request->category;
        $article->author_id=$request->author;
        $image=$request->file('image');
        $filename=time() . '.' .$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('/uploads/images/article/'.$filename));
        $article->image=$filename;
        // $category->articles()->($article);

         // $category=
        if($article->save()){
            return redirect()->back()->with('success_article', 'Article Created Successfully.');
        }

        // return $article;
    }
    public function updateArticle(Request $request, $id){
         $this->validate($request,[
            'article_title'=>'required',
            'article_desc'=>'required',
            'category'=>'required',
            'author'=>'required'
         ]);
        $articles=article::findorfail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
             $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)-> resize(300,300)->save(public_path('/uploads/images/article/'.$filename));
            $articles->image=$filename;
            // $path = $request->file('image')->store('public/images');
            // $post->image = $path;
        }
        $articles->article_title=$request->article_title;
        $articles->article_desc=$request->article_desc;
        $articles->article_category_id=$request->category;
        $articles->author_id=$request->author;
        $articles->save();
    // return $articles;
        return redirect()->back()->with('success_update_article', 'Article view Updated Successfully.');

    }
    public function deleteArticle($id)
    {
        $articles=article::where('id',$id)->first();
        if($articles->delete()){
         return redirect()->back()->with('success_article_delete', 'Article Deleted Successfully.');
        }
    }
    
    public function articleCategory(Request $request)
    {
         $this->validate($request,[
            'article_category'=>'required'
             
        ]);
        $category=new article_category();
        $category->article_category=$request->article_category;
        
        if($category->save()){
            return redirect()->back()->with('success_category', 'Article Category Created Successfully.');
        // return $category;
        }
    }
     public function updateCat(Request $request, $id){
       $cat=article_category::findorfail($id);
        $this->validate($request,[
            'article_category'=>'required'
                
        ]);
        $cat->article_category=$request->article_category;
        $cat->save();
    
        return redirect()->back()->with('success_category_update', 'Category Updated Successfully.');

    }
    public function deleteCat($id)
     {
        $cats=article_category::where('id',$id)->first();
        if($cats->delete()){
         return redirect()->back()->with('success_category_delete', 'Category Deleted Successfully.');
        }
    }

    // Author Controller
        public function createAuthor(Request $request)
    {
         $this->validate($request,[
            'name'=>'required',
            'about'=>'required',
            'image'=>'required|mimes:jpg,svg,png,jpeg,gif',
            'facebook'=>'required',
            'email'=>'required',
            'twitter'=>'required',
            'instagram'=>'required'
        ]);
        $author= new article_author();

        $author->name=$request->name;
        $author->about=$request->about;
        $author->image =$request->image;
        $author->facebook=$request->facebook;
        $author->email=$request->email;
        $author->twitter=$request->twitter;
        $author->instagram=$request->instagram;
        $image=$request->file('image');
        $filename=time() . '.' .$image->getClientOriginalExtension();
        
        $path = public_path('uploads/images/author/'.$filename);
        Image::make($image)->resize(468, 249)->save($path);
         $author->image=$filename;
         if($author->save()){
         
        return redirect()->back()->with('success_author', 'Article Author Created Successfully.');
        // return $author;
        }
    }
     public function updateAuthor(Request $request, $id)
    {
        $request->validate([
          'name'=>'required',
            'about'=>'required',
            'facebook'=>'required',
            'email'=>'required',
            'twitter'=>'required',
            'instagram'=>'required'
         ]);
        
        $author=article_author::findorfail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            $path = public_path('uploads/images/author/'.$filename);
            Image::make($image)->resize(468, 249)->save($path);
             // Image::make($image)-> resize(300,300)->save(public_path('/uploads/images/article/'.$filename));
             $author->image=$filename;
        } 
            $author->name=$request->name;
        $author->about=$request->about;
        // $author->image =$request->image;
        $author->facebook=$request->facebook;
        $author->email=$request->email;
        $author->twitter=$request->twitter;
        $author->instagram=$request->instagram;
        $author->save();
        // return $author;
         return redirect()->back()->with('success_author_update', 'Author Updated Successfully.');
    }
    public function deleteAuthor($id)
     {
        $author=article_author::where('id',$id)->first();
        if($author->delete()){
         return redirect()->back()->with('success_author_delete', 'Author Deleted Successfully.');
        }
    }

     

 
     
}
