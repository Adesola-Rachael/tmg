<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\slider;
use App\Models\service;
use App\Models\fonts;
use App\Models\believe;
use App\Models\course;
use App\Models\team;
use App\Models\benefit;
use App\Models\article;
use App\Models\comment;
use App\Models\reply;
use App\Models\unit_image;
use App\Models\article_category;
use App\Models\article_author;
use App\Models\mission;
use App\Models\newsletter;
use App\Models\contact;
use App\Models\register_course;
use App\Models\indexView; 
use App\Models\visits; 
use App\Models\company_info;
use DB;
class pagesController extends Controller
{ 
    public function mainPage(Request $request){
         $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();

         $visit=new visits();
         $ip= Hash::make($request->ip());
         $visit->visit= $ip;
         $visit->save();

        $sliders = DB::table('sliders')->get();
        // company's info
         $company_infos=company_info::get()->first();
         // service
        $services=service::orderBy('created_at','asc')->get();
        // courses
        $courses= DB::table('courses')->get();
        $cor1=course::orderBy('created_at','desc')->limit(3)->get();
        $cor2=course::orderBy('created_at','asc')->limit(3)->get();
        $course_image=DB::table('unit_images')->where('name','=','COURSE')->get()->first();
        // articles
        $articles =article::orderBy('created_at','asc')->limit(3)->get();
        $cats=article_category::orderBy('created_at','asc')->get();
        $sidebars=article::distinct()->get(['id']);
        $sideCount=count($sidebars);
        // $category=article::where('articleCategory_id',$id);
        // benefit of registration
        $benefits=benefit::limit(3)->get();
        // Overview in about page on main page
        $overview = DB::table('believes')->get();
        // team
        $teams=  DB::table('teams')->get();
        // fonts
        $fonts=fonts::orderBy('created_at','asc')->get();
        // return
       $pageTitle='tmgr|home';
        return view('index',compact('course_image','unit_image','company_infos','fonts','benefits','sliders','teams','cor1','cor2','articles','sidebars','sideCount','services','overview','cats','pageTitle'));
    }
     
    public function getBenefit() { 
         $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
        $company_infos=company_info::get()->first();
        $fonts=fonts::orderBy('created_at','asc')->get();
        $benefits=benefit::orderBy('created_at','asc')->get();
        $pageTitle= 'tmgr |Services';
        $bar_title='Services';
        return view('benefit',compact('unit_image','company_infos','benefits','fonts', 'pageTitle','bar_title'));
    }
    
    public function getMainPageService() { 
          $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
        $company_infos=company_info::get()->first();
    	$fonts=fonts::orderBy('created_at','asc')->get();
        $services=service::orderBy('created_at','asc')->get();
        $pageTitle= 'tmgr |Services';
        $bar_title='Services';
        return view('services',compact('unit_image','company_infos','services','fonts', 'pageTitle','bar_title'));
    }
    public function getMainPageTeam(){
        $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
         $company_infos=company_info::get()->first();
         $teams=team::orderBy('created_at','asc')->get();
        $pageTitle= 'tmgr |Team';
        $bar_title='Our Team';
        return view('team',compact('unit_image','teams','company_infos', 'pageTitle','bar_title'));
    } 
    public function getMainPageAbout()
    {
        $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
        $mission_image=DB::table('unit_images')->where('name','=','MISSION')->get()->first();
        $company_infos=company_info::get()->first();
        $overview = DB::table('believes')->get();
        $missions=DB::table('missions')->where('row_name','=','MISSION')->get();
        $visions=DB::table('missions')->where('row_name','=','VISION')->get();
        $pageTitle= 'tmgr | About';
        $bar_title='About Us';
        return view('about',compact('mission_image','unit_image','company_infos','overview','missions','visions', 'pageTitle','bar_title'));
    }
      public function getMainPageCourse()
    {
        $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
        $course_image=DB::table('unit_images')->where('name','=','COURSE')->get()->first();
         $company_infos=company_info::get()->first();
        $courses = DB::table('courses')->get();
        $cor1=course::orderBy('created_at','desc')->limit(3)->get();
        $cor2=course::orderBy('created_at','asc')->limit(3)->get();
        $pageTitle= 'tmgr |courses';
        $bar_title='Courses';
        return view('courses',compact('course_image','unit_image','company_infos','courses', 'cor1','cor2','pageTitle','bar_title')); 
    }
    public function getmainContact()
    {
       $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
         $company_infos=company_info::get()->first();
        $contacts=contact::orderBy('created_at','asc')->get();
        $pageTitle= 'tmgr | Contact';
        $bar_title='Contact';
        return view('contact_us',compact('unit_image','company_infos','contacts', 'pageTitle','bar_title')); 
    }
    public function CreateMainPageContact(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',

            // 'service_font'=>'required'
        ]);
        $contact=new contact();
        $contact->name=$request->name;
        $contact->subject=$request->subject;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->message=$request->message;
        if($contact->save()){
            return redirect()->back()->with('success_contact', 'Thanks. We will get back to your shortly');
        }
        
    }
   
    public function newsletter(Request $request)
    {
      $request->validate([
          'email'=>'required',
             
         ]);  
       
        $newsletter= new newsletter();
         $newsletter->email=$request->email;
        if($newsletter->save()){
            return redirect()->back()->with('success_newsletter', 'Thanks for subscribing.');
        }
    }
    public function getMainPageArticles(Request $request)
    {
        // $articles=article::paginate(3);
       $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
         $company_infos=company_info::get()->first();
        if($request->input('type')=='visited'){ 
            $articles=article::orderBy('views','desc')->paginate(10);
            $organise="Most Visited";
            
        }elseif($request->input('type')=='recent'){
           $articles=article::orderBy('created_at','asc')->paginate(10);
            $organise="Recent Post";
        }elseif($request->input('type')=='search'){
            $articles=article::select("article_desc")->where("article_desc","LIKE","%{$request->terms}%")->get()->first();
        }
        // elseif ($request->input('type')=='popular') {
        //    $articles=articles::join('comments','articles.id','=','comments.article')->orderBy('comment','desc')->paginate(2);
        // }
//          DB::table('users')
// ->select('users.id','users.name','profiles.photo')
// ->join('profiles','profiles.id','=','users.id')
// ->where(['something' => 'something', 'otherThing' => 'otherThing'])
// ->get();
        // elseif($request->input('type')=='category'){
        //     $articles=article::orderBy('article_category_id','')->distinct()->paginate(5);
        // }
         else{ $articles=article::orderBy('created_at','asc')->paginate(10);} 
        
        // $articles=article::orderBy('created_at','asc')->paginate(5)
        // $articles=article::orderBy('views','desc')->paginate(5)
         // $articles = array('articles' => $articles );

        $side_arts=article::orderBy('created_at','asc')->get();


        $side_cats=article::select('article_category_id')->distinct()->get();
        $cats=DB::table('article_categories')->select('id')->get();
        $sidebars=article::orderBy('created_at','asc')->first();
        $populars=article::orderBy('created_at','asc')->limit(5)->get();
        $pageTitle= 'tmgr |Article';
        $bar_title='Articles';
         return view('articles',compact('unit_image','company_infos' ,'side_cats','articles','side_arts','populars', 'cats','sidebars','pageTitle','bar_title')); 
    }

    // public function LikePost(Request $request){

    //     $articles = article::find($request->id);
    //     $response =toggleLike($articles);

    //     return response()->json(['success'=>$response]);
    // }

    public function getArticleById($id)  
    {
       $unit_image=DB::table('unit_images')->where('name','=','NAV_BAR')->get();
        $company_infos=company_info::get()->first();
       article::where('article_id', $id)->get()->first()->increment('views');
        $article=article::where('article_id', $id)->get()->first();

        $side_arts=article::orderBy('created_at','asc')->get();
        $side_cats=article::select('article_category_id')->distinct()->get();
        //$side_cats_count=article::select('article_category_id')->withcount('article_category_id')->get();
        $cats=article_category::orderBy('created_at','asc')->get();
        $comments=comment::orderBy('created_at','asc')->get();
        // $comments=article::find($id)->comments;
        // $replies=comment::find($id)->replies;
        // $count=count($comments);
        $populars=article::orderBy('created_at','asc')->limit(5)->get();
        $pageTitle= 'tmgr |Article';
        $bar_title='Articles';
        return view('details',compact('unit_image','company_infos','side_cats','article','side_arts' ,'comments','populars','pageTitle','bar_title')); 
    }
    public function addcomment(Request $request)
    {   $request->validate([
          'name'=>'required',
            'email'=>'required',
            'comment'=>'required',
        ]);
        // 
        $comment=new comment();
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $articles=article::find($request->article_id);
        // $comment->article_id=$request->;
        // if($comment->save()){
        //   return redirect()->back()->with('success_comment', 'Comments  succes made.');  
        // }
        //  return redirect()->back()->withErrors('success_comment', 'Comments  succes made.');  
        $articles->comments()->save($comment);
       return redirect()->back()->with('success_comment', '');
        // return $comment.$article_id;
        
    }
    // public function getcommentByArticle($id)
    // {
    //     $comments=article::find($id)->comments;

         // return view('details')->with('comments', $comments); 
        //return view('details', compact('comments')); 
    //     return $comments;
    // }
    public function addReplies(Request $request, $comment_id)
    {
        
        $comments=comment::find($comment_id);
        
        $reply=new reply();

        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->reply = $request->reply;
        $comments->reply()->save($reply);
        return redirect()->back()->with('success_comment', 'Comments  succes made.');
        
        // return $reply;

     //    return response()->json(
     //        [
     //            'success' => true,
     //            'message' => 'Data inserted successfully'
     //        ]
     // );
    }
    public function registerCourse(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'location'=>'required',
             
        ]);
        $regcourse = new register_course();
        $regcourse->course_id=$request->course_id;
        $regcourse->name=$request->name;
        $regcourse->email=$request->email;
        $regcourse->phone=$request->phone;
        $regcourse->location=$request->location;
        $regcourse->comment=$request->comment;
        if($regcourse->save()){
            return redirect()->back()->with('success_course_registered', 'Course Registered. We will get back to you shortly');
        }
    }
 
}
