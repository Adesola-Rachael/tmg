<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Auth;
use Image;
use App\Models\slider;
use App\Models\service;
use App\Models\fonts;
use App\Models\believe;
use App\Models\course;
use App\Models\team;
use App\Models\benefit;
use App\Models\mission;
use App\Models\unit_image;
use App\Models\register_course;
use App\Models\company_info;
use App\Models\User;
use App\Models\article;
use App\Models\contact;
use App\Models\visits;
 use DB;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function logout(){
    //     return view('home',array('user' => Auth::user() ));
    // }
    public function  adminProfile(){
        $pageTitle='tmgr | adminprofile';
         $pageName='Admin Profile';
         $user= Auth::user();
    	return view('cube/myprofile',compact('user','pageName','pageTitle'));
    }
     public function updateAdminProfile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
         ]);
        $pageTitle='tmgr | adminprofile';
         $pageName='Admin Profile';
        $user=Auth::user();
        if($request->hasFile('image')){

             $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            Storage::delete('/uploads/images/'.$user->image);
            $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('/uploads/images/'.$filename));
            $user->image=$filename;
            // $user=Auth::user();
        }
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            return view('cube/myprofile',compact('user','pageName','pageTitle'));

        
        return view('cube/myprofile',array('user' => Auth::user())); 
    }
    
    public function dashboard(){
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greet= "Good morning";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
           $greet=  "Good afternoon";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17") {
            $greet=  "Good evening";
        }  

        $pageTitle='tmgr | dashboard';
        $date=date("Y-m-d h:i:sa");
        $user= Auth::user();
        $pageTitle='tmgr | dashboard';
        $articles=article::get(['id']);$article_box='Articles uploads';
        $contact=contact::get(['id']); $allcon='Contact List';
        $addview=article::sum('views'); $allviews=" All Article Views";
        $registered=register_course::get(['id']); $reg='Registered Students';
        $visitor=visits::get(['id']); $visit='Total Visits';
        $uniqueVisit=DB::table('visits')->distinct('visit')->count('visit');
        $today_visit=visits::whereDate('created_at', '=', date('Y-m-d'))->get();
        $percentage_visit_today=( count($visitor) * count($today_visit))/100;
        $percentage_unique_visit=( count($visitor) * $uniqueVisit)/100;
        // $today_visit=visits::count('visit')->where('created_at','=', $date);
    	return view('cube/dashboard',compact('percentage_unique_visit','greet','percentage_visit_today','today_visit','uniqueVisit','visitor','visit','allviews','addview','contact','allcon','reg','registered','article_box','articles','user', 'pageTitle'));
        
    }
    public function SuperAdmin()
    {   
        $pageTitle='tmgr | superadmin';
         $pageName='Super Admin Page';
         $company_infos=company_info::get()->first();
         $user= Auth::user();
         $users=User::get();
        return view('cube/superadmin',compact('company_infos','users','user', 'pageName','pageTitle'));
    }
     public function deleteAdmin($id)
     {
        $user=User::where('id',$id)->first();
        // if(User::where('id' ,'=','10')){
        //     return redirect()->back()->with('success_check', 'This admin canno.');
        // }
        if($user->delete()){
         return redirect()->back()->with('success_delete', 'Amin Removed.');
        }
    }
    public function updateCompany_info(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'abbr'=>'required',
            'phone'=>'required',
            'location'=>'required',
            'CEO'=>'required',
            'email'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'linkedin'=>'required',
            'pinterest'=>'required',
            'description'=>'required'
           

         ]);
        
        $info=company_info::findorfail($id);
        $info->name=$request->name; 
        $info->description=$request->description; 
        $info->abbr=$request->abbr;  
        $info->phone=$request->phone;  
        $info->location=$request->location; 
        $info->CEO=$request->CEO;  
        $info->email=$request->email;  
        $info->facebook=$request->facebook; 
        $info->twitter=$request->twitter;
        $info->instagram=$request->instagram;  
        $info->linkedin=$request->linkedin;   
        $info->pinterest=$request->pinterest;  
        $info->save();
        return redirect()->back()->with('success_info', 'Info Updated Successfully.');  
    }


    public function getSlides()
    {   $pageName='Slides';
        $sliders=slider::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | slides';
        return view('cube/manage_slides',compact('user','sliders', 'pageName','pageTitle'));
    }
    public function createSlide(Request $request){
        $this->validate($request,[
            'slide_title'=>'required',
            'slide_text'=>'required',
            'image'=>'required|mimes:jpg'
        ]);
        $slider=new slider();
        $slider->slide_title=$request->slide_title;
        $slider->slide_text=$request->slide_text;
        $image=$request->file('image');
        $filename=time() . '.' .$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('/uploads/images/slider/'.$filename));
        $slider->image=$filename;
        if($slider->save()){
            return redirect()->back()->with('success_slider', 'Slider Created Successfully.');
        }
    }
    public function updateSlide(Request $request, $id)
    {
        $request->validate([
            'slide_title'=>'required',
            'slide_text'=>'required'
         ]);
        
        $slider=slider::findorfail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
            $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/slider/'.$filename));
            $slider->image=$filename;
        }
            $slider->slide_title=$request->slide_title;
            $slider->slide_text=$request->slide_text;
            $slider->save();
        return redirect()->back()->with('success_slider', 'slide Updated Successfully.');
    }
    public function deleteSlide($id)
     {
        $slider=slider::where('id',$id)->first();
        if($slider->delete()){
         return redirect()->back()->with('success_delete', 'Slide Deleted Successfully.');
        }
    }
    
    public function getService()
    {   
        $pageName='Services';
        $fonts=fonts::orderBy('created_at','asc')->get();
        $services=service::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage services';
        return view('cube/manage_service',compact('user','services','pageName','fonts', 'pageTitle'));
    }
     public function createService(Request $request){
        $this->validate($request,[
            'service_title'=>'required',
            'service_text'=>'required',
            'service_fonts'=>'required'
        ]);
        $service=new service();
        $service->title=$request->service_title;
        $service->text=$request->service_text;
        $service->font_id=$request->service_fonts;
        if($service->save()){
            return redirect()->back()->with('success_service', 'Service Created Successfully.');
        }
    }
    public function updateService(Request $request, $id)
    {
        $request->validate([
            'service_title'=>'required',
            'service_text'=>'required',
            'service_fonts'=>'required'
         ]);
        
        $service=service::findorfail($id);
        $service->title=$request->service_title;
        $service->text=$request->service_text;
        $service->font_id=$request->service_fonts;
        if($service->save()){
            return redirect()->back()->with('success_update', 'Service Updated Successfully.');
        }
        return $service;
    } 
    public function deleteService($id)
    {
        $service=service::where('id',$id)->first();
        if($service->delete()){
         return redirect()->back()->with('success_delete', 'Service Deleted Successfully.');
        }
    }
     public function getOthers()
    {   $pageName='Other Units';
        $fonts=fonts::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Others';
        return view('cube/manage_others',compact('user','fonts', 'pageName','pageTitle'));
    }
     public function getFonts(Request $request){
        $this->validate($request,[
            'font_name'=>'required',
            'font_desc'=>'required'
            // 'service_font'=>'required'
        ]);
        $fonts=new fonts();
        $fonts->font_name=$request->font_name;
        $fonts->font_desc=$request->font_desc;
        if($fonts->save()){
            return redirect()->back()->with('success_fonts', 'Font Created Successfully.');
        }
        
    }
     public function updateFont(Request $request, $id)
    {
        $request->validate([
            'font_name'=>'required',
            'font_desc'=>'required'
         ]);
        
        $font=fonts::findorfail($id);
        $font->font_name=$request->font_name;
        $font->font_desc=$request->font_desc;
        $font->save();
    
        return redirect()->back()->with('success_fonts', 'Font Updated Successfully.');  
    }
    public function deleteFont($id)
     {
        $font=fonts::where('id',$id)->first();
        if($font->delete()){
         return redirect()->back()->with('success_delete', 'Font Deleted Successfully.');
        }
    }
      public function getBelieve()
    {   $pageName='Believe';
        $believes=believe::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Believe ';
        return view('cube/manage_believe',compact('user','believes','pageName', 'pageTitle'));
    }
     
    public function updateBelieve(Request $request, $id)
    {
        $request->validate([
           'believe_small_title'=>'required',
            'believe_title'=>'required',
            'believe_text'=>'required',
         ]);
        
        $believe=believe::findorfail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
             $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)-> resize(300,300)->save(public_path('/uploads/images/believe/'.$filename));
            $believe->image=$filename;
            // $path = $request->file('image')->store('public/images');
            // $post->image = $path;
        }
        $believe->believe_small_title=$request->believe_small_title;
        $believe->believe_title=$request->believe_title;
        $believe->believe_text=$request->believe_text;
        $believe->save();
    
        return redirect()->back()->with('success_beleive', 'Overview Updated Successfully.');
    }
    public function getRegisteredCourse()

    {   
        $pageName='Registered Courses';   
        $fonts=fonts::orderBy('created_at','asc')->get();
        $courses=course::orderBy('created_at','asc')->limit(3)->get();
        $registered_course=register_course::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Registered Course ';
        return view('cube/manage_register_course',compact('user','courses','registered_course','fonts' ,'pageName','pageTitle'));
    }

      
    public function getCourse()

    {   
        $pageName='Courses';   
        $fonts=fonts::orderBy('created_at','asc')->get();
        $unit_image=DB::table('unit_images')->where('name','=','COURSE')->get();
        $courses=course::orderBy('created_at','asc')->limit(3)->get();
        $cor1=course::orderBy('created_at','desc')->limit(3)->get();
        $cor2=course::orderBy('created_at','asc')->limit(3)->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Course ';
        return view('cube/manage_course',compact('user','courses','unit_image','cor1','cor2','fonts' ,'pageName','pageTitle'));
    }
    public function createCourse(Request $request){
        $this->validate($request,[
            'course_title'=>'required',
            'course_desc'=>'required',
            'course_fonts'=>'required'
        ]);
        $course=new course();
        $course->title=$request->course_title;
        $course->description=$request->course_desc;
        $course->font_id=$request->course_fonts;
        if($course->save()){
            return redirect()->back()->with('success_course', 'Course Created Successfully.');
        }  
        // return $course;
    }
    public function updateCourse(Request $request, $id){
       $course=course::findorfail($id);
        $this->validate($request,[
        'course_title'=>'required',
        'course_desc'=>'required',
        // 'course_fonts'=>'required'
        ]);
        $course->title=$request->course_title;
        $course->description=$request->course_desc;
        $course->font_id=$request->course_fonts;
        if($course->save()){
            return redirect()->back()->with('success_course_update', 'Course Updated Successfully.');
        } 

    }
    public function deleteCourse($id)
     {
        $course=course::where('id',$id)->first();
        if($course->delete()){
         return redirect()->back()->with('success_delete', 'Course Deleted Successfully.');
        }
    }
     public function getTeam()
    {   $pageName='Team';
        $teams=team::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Team';
        return view('cube/manage_team',compact('user','teams','pageName', 'pageTitle'));
    }
    public function createTeam(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'role'=>'required',
            'about'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'email'=>'required',
            'image'=>'required|mimes:jpg,png,svg,'
        ]);
        $team=new team();
        $team->name=$request->name;
        $team->role=$request->role;
        $team->about=$request->about;
        $team->twitter=$request->twitter;
        $team->facebook=$request->facebook;
        $team->instagram=$request->instagram;
        $team->email=$request->email;
        $image=$request->file('image');
        $filename=time() . '.' .$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('/uploads/images/team/'.$filename));
        $team->image=$filename;
        if($team->save()){
            return redirect()->back()->with('success_team', 'Team Created Successfully.');
        }
         
    }
   
     public function updateTeam(Request $request, $id)
    {
        $request->validate([
           'name'=>'required',
            'role'=>'required',
            'about'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'email'=>'required',
         ]);
        
        $team=team::findorfail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
             $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)-> resize(300,300)->save(public_path('/uploads/images/team/'.$filename));
            $team->image=$filename;
        }
            $team->name=$request->name;
            $team->role=$request->role;
            $team->about=$request->about;
            $team->twitter=$request->twitter;
            $team->facebook=$request->facebook;
            $team->instagram=$request->instagram;
            $team->email=$request->email;
            $team->save();
    
        return redirect()->back()->with('success_team_update', 'Team Updated Successfully.');
    }
    public function deleteTeam($id)
     {
        $team=team::where('id',$id)->first();
        if($team->delete()){
         return redirect()->back()->with('success_delete', 'Team Deleted Successfully.');
        }
    }
    // functions for benefit
     public function getBenefit()
    {   
        $pageName='Benefit';
        $fonts=fonts::orderBy('created_at','asc')->get();
        $benefits=benefit::orderBy('created_at','asc')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Benefit';
        return view('cube/manage_benefit',compact('fonts','user','pageName','benefits', 'pageTitle'));
    }
     public function createBenefit(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'detail'=>'required',
            'benefit_fonts'=>'required',
        ]);
        $benefit=new benefit();
        $benefit->title=$request->title;
        $benefit->detail=$request->detail;
        $benefit->font_id=$request->benefit_fonts;
         
        if($benefit->save()){
            return redirect()->back()->with('success_benefit', 'Bnefit Created Successfully.');
        }
         
    }
     public function updateBenefit(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
         ]);
        
        $benefit=benefit::findorfail($id);
        $benefit->title=$request->title;
        $benefit->detail=$request->detail;
        $benefit->font_id=$request->benefit_fonts;
        $benefit->save();
    
        return redirect()->back()->with('success_update', 'Benefit Updated Successfully.');  
    }
     public function deleteBenefit($id)
     {
        $benefits=benefit::where('id',$id)->first();
        if($benefits->delete()){
         return redirect()->back()->with('success_delete', 'Benefit Deleted Successfully.');
        }
    }
    // functions for mission
   
  
    public function getMission()
    {   
        $pageName='Vision & Mission';
        $unit_image=DB::table('unit_images')->where('name','=','MISSION')->get();
        $missions=DB::table('missions')->where('row_name','=','MISSION')->get();
        $visions=DB::table('missions')->where('row_name','=','VISION')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Mission';
        return view('cube/manage_mission',compact('user','visions','unit_image','missions','pageName' ,'pageTitle'));
    }
    public function updateMission(Request $request, $id)
    {

        $request->validate([
            'title'=>'required',
            'detail'=>'required'
         ]);
        
        $mission=mission::findorfail($id);
        $mission->title=$request->title;
        $mission->detail=$request->detail;
        $mission->save();
    
        return redirect()->back()->with('success_mission', 'Updated Successfully.');  
    }
    public function getUnitImage(){
        $pageName='Unit Images';
        $unit_image=DB::table('unit_images')->get();
        $user= Auth::user();
        $pageTitle='tmgr | manage Unit Images';
        return view('cube/manage_unit_image',compact('user','unit_image','pageName' ,'pageTitle'));

    }
    public function  postUnitImage(Request $request, $id)
    { 
        
        $unit_image=unit_image::findorfail($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
            ]);
            $image=$request->file('image');
            $filename=time() . '.' .$image->getClientOriginalExtension();
            Image::make($image)-> resize(300,300)->save(public_path('/uploads/images/unit_image/'.$filename));
            $unit_image->image=$filename;
            // $path = $request->file('image')->store('public/images');
            // $post->image = $path;
        }
         
        $unit_image->save();
        // return $unit_image;
    
        return redirect()->back()->with('success_unit_image', 'Image Updated Successfully.');
    }
     
     
     
      
}
