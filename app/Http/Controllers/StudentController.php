<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notice;
use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index(){
        $notices = Notice::latest()->paginate(3);
        return view("school.index", compact("notices"));
    }



    public function about(){
        return view("school.about");
    }

    public function admission(){
        return view("school.admissions");
    }

    public function contact(){
        return view("school.contact");
    }

    public function course(){
        return view("school.courses");
    }

    public function courseSingle(){
        return view("school.course-single");
    }

    public function singleNotice($id){
        $single_notice = Notice::find($id);
        $user_infos = DB::table("users")->join("comments", "comments.user_id", "users.id")->select("users.id", "users.name", "users.image", "users.type")->get();
        $show_comments = Comment::all();
        $reply_comments = ReplyComment::all();
        return view("school.notice-single", compact("single_notice", "user_infos", "show_comments", "reply_comments"));
    }
    public function login(){
        return view("admin.login");
    }

    public function register(){
        return view("admin/register");
    }

       // register any user method
       public function registerUser(Request $request)
       {
           //validation 
           $this->validate($request, [
               "email" => ["unique:users"],
           ]);
   
           //image unique name generation.
           if ($request->hasFile('file')) {
               $img = $request->file('file');
               $unique_name = md5(time() . rand() . "." . $img->getClientOriginalExtension());
               $img->move(public_path("uploads/profiles"), $unique_name);
           }
           //for register in database
           $user = new User;
           $user->name = $request->name;
           $user->email = $request->email;
           $user->image = $unique_name;
           $user->type = $request->type;
           $user->teacher_role = $request->teacher_role;
           $user->teacher_description = $request->teacher_description;
           $user->staff_role = $request->staff_role;
           $user->password = HASH::make($request->password);
           //$user->remember_token = time().rand();
           $user->save();
   
           //user information array for sending in registermail.
        //    $user_info =[
        //        "id" => $user->id,
        //        "name" => $request->name,
        //        "type" => $request->type,
        //        "email" => $request->email,
        //        "password" => $request->password,
        //        "remember_token" => $user->remember_token,
        //    ];
   
   
           //send mail
        //    Mail::to($request->email)->send(new RegisterMail($user_info));
        return redirect()->route('student.login')->with("success", "Congratulations $request->name, Your Account is ready");
        //, please verify your account via email
       }




        //login any user with verification and restrictions.
    public function loginUser(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) { 
            //$auth_type = Auth::user()->type;
            $auth_status = Auth::user()->user_status;
            // $auth_user_status = Auth::user()->status;
            // $auth_remember_token = Auth::user()->remember_token;

                // if($auth_user_status == false || $auth_remember_token != NULL){
                //     Session::flush();
                //     Auth::guard("web")->logout();
                //     return redirect()->route('cake.login')->with('error', "Please verify your account via mail");

                    if($auth_status=="block"){
                        Session::flush();
                        Auth::guard("web")->logout();
                        return redirect()->route('student.login')->with('error', "Please contact to the principle");
                    }elseif($auth_status=="active"){
                        return redirect()->route("admin.dash")->with('success', "Login Success!!!!");
                    }

        }else {
            return redirect()->route('student.login')->with('error', "Email or Password has been wrong");
        }
    }

        //logout method
        public function logoutUser()
        {
            Session::flush();
            Auth::guard("web")->logout();
            return redirect()->route('student.login')->with('success', "logged out successfully");
        }
    
    

    public function dashboard(){
        if(Auth::user()!=null){
            return view("admin.dash"); 
               
        }
        return redirect()->route('student.login'); 
        
           
    }



    public function teachers(){
        $teachers = User::where("type", "teacher")->get();
        if(Auth::user()->type=="admin" && Auth::user()->id!=NULL){
            return view("admin.teacher", compact("teachers"));
        }
            return redirect()->route('student.login');
    }


        //admin can change user status
        public function changeUserStatus($status, $id){
            if(Auth::user()->type=="admin"){
                //dd($status, $id);
                $user = User::find($id);
                $user->user_status = $status;
                $user->save();
                
                return redirect()->back()->with("success", "User Status Updated Successfull!!");
            }
            return redirect()->back();
        }

     //team trash method
     public function teacherTrash($id){
        //if(Session::get('type')=="Admin"){
        $trash_teacher = User::withTrashed()->find($id);
        $trash_teacher->delete();
        
        return redirect()->route("teacher.trash.page")->with("success", "Teacher Trashed Successfull!!");
        //}
        //return redirect()->back();
    }

    //teacher trash page
    public function teacherTrashPage(){
        //if(Session::get('type')=="Admin"){
        $all_trash_teacher = User::onlyTrashed()->get();
        return view("admin.teacher_trash", compact("all_trash_teacher"));
        //}
        //return redirect()->back();
    }

    //team data restore
    public function teacherRestore($id){
        //if(Session::get('type')=="Admin"){
        $trash_teacher = User::withTrashed()->find($id);
        if(!is_null($trash_teacher)){
            $trash_teacher->restore();
        }
        
        return redirect()->route('admin.teachers')->with("success", "Team Data Restore Successfull!!");
        //}
        //return redirect()->back();
    }

    //delete permanently team data
    public function teacherForceDelete($id){
        //if(Session::get('type')=="Admin"){
        $trash_teacher = User::withTrashed()->find($id);
        
        if(!is_null($trash_teacher)){
            $trash_teacher->forceDelete();
        }
        
        return redirect()->route("teacher.trash.page")->with("success", "Product Delete permanently Successfull!!");
        //}
        //return redirect()->back();
    }





    public function staff(){
        if(Auth::user()->type=="admin"){
            $all_staff = User::where("type", "staff")->get();
            return view("admin.staff", compact("all_staff"));
        }else{
            return redirect()->route('student.login');
        }
    }

      //admin can change user status
      public function changeStaffStatus($status, $id){
        if(Auth::user()->type=="admin"){
            //dd($status, $id);
            $user = User::find($id);
            $user->user_status = $status;
            $user->save();
            
            return redirect()->back()->with("success", "User Status Updated Successfull!!");
        }
        return redirect()->back();
    }

 //team trash method
 public function staffTrash($id){
    //if(Session::get('type')=="Admin"){
    $trash_staff = User::withTrashed()->find($id);
    $trash_staff->delete();
    
    return redirect()->route("staff.trash.page")->with("success", "staff Trashed Successfull!!");
    //}
    //return redirect()->back();
}

//teacher trash page
public function staffTrashPage(){
    //if(Session::get('type')=="Admin"){
    $all_trash_staff = User::onlyTrashed()->where('type', 'staff')->get();
    return view("admin.staff_trash", compact("all_trash_staff"));
    //}
    //return redirect()->back();
}

//team data restore
public function staffRestore($id){
    //if(Session::get('type')=="Admin"){
    $trash_staff = User::withTrashed()->find($id);
    if(!is_null($trash_staff)){
        $trash_staff->restore();
    }
    
    return redirect()->route('admin.staff')->with("success", "Team Data Restore Successfull!!");
    //}
    //return redirect()->back();
}

//delete permanently team data
public function staffForceDelete($id){
    //if(Session::get('type')=="Admin"){
    $trash_staff = User::withTrashed()->find($id);
    
    if(!is_null($trash_staff)){
        $trash_staff->forceDelete();
    }
    
    return redirect()->route("staff.trash.page")->with("success", "staff Delete permanently Successfull!!");
    //}
    //return redirect()->back();
}






    public function students(){
        if(Auth::user()->type=="admin"){
            $all_student = User::where("type", "student")->get();
            return view("admin.student", compact("all_student"));
        }
            return redirect()->route('student.login');
  
    }

    
      //admin can change user status
      public function changeStudentStatus($status, $id){
        if(Auth::user()->type=="admin"){
            //dd($status, $id);
            $user = User::find($id);
            $user->user_status = $status;
            $user->save();
            
            return redirect()->back()->with("success", "User Status Updated Successfull!!");
        }
        return redirect()->back();
    }

 //team trash method
 public function studentTrash($id){
    //if(Session::get('type')=="Admin"){
    $trash_student = User::withTrashed()->find($id);
    $trash_student->delete();
    
    return redirect()->route("student.trash.page")->with("success", "student Trashed Successfull!!");
    //}
    //return redirect()->back();
}

//teacher trash page
public function studentTrashPage(){
    //if(Session::get('type')=="Admin"){
    $all_trash_student = User::onlyTrashed()->where('type', 'student')->get();
    return view("admin.student_trash", compact("all_trash_student"));
    //}
    //return redirect()->back();
}

//team data restore
public function studentRestore($id){
    //if(Session::get('type')=="Admin"){
    $trash_student = User::withTrashed()->find($id);
    if(!is_null($trash_student)){
        $trash_student->restore();
    }
    
    return redirect()->route('admin.students')->with("success", "student Data Restore Successfull!!");
    //}
    //return redirect()->back();
}

//delete permanently team data
public function studentForceDelete($id){
    //if(Session::get('type')=="Admin"){
    $trash_student = User::withTrashed()->find($id);
    
    if(!is_null($trash_student)){
        $trash_student->forceDelete();
    }
    
    return redirect()->route("student.trash.page")->with("success", "student Delete permanently Successfull!!");
    //}
    //return redirect()->back();
}


public function notice(){
    $notices = Notice::latest()->paginate(3);
    return view("admin.notice", compact("notices"));
}


//upload blog method
public function uploadNotice(Request $request){
    if(Auth::user()!=null){
         //unique img name generation
         if($request->hasFile('notice_image')){
            $img = $request->file('notice_image');
            $unique_name= md5(time().rand()). "." . $img->getClientOriginalExtension();
            $img->move(public_path("uploads/notice"), $unique_name);
        }

        $notice = new Notice;
        $notice->notice_title = $request->notice_title;
        $notice->notice_image = $unique_name;
        $notice->notice_description = $request->notice_description;
        $notice->save();
        // return redirect()->back()->with("success", "Notice Upload Succcess");
        return response()->json([
            "status" => "success",
            "msg" => "Data Uploaded Success"
        ]);
    }
}



    //update notice
    public function updateNotice(Request $request){
            if(Auth::user()!=null){
            //image unique name generation.
            if($request->hasFile('up_notice_image')){
                $img = $request->file('up_notice_image');
                $unique_name = md5(time().rand().".". $img->getClientOriginalExtension());
                $img->move(public_path("uploads/notice"), $unique_name);
            }
    
            $notice = Notice::find($request->up_id);
            //dd($notice->notice_title);

            $notice->notice_title = $request->up_notice_title;

            if(!empty($unique_name)){
                $notice->notice_image=$unique_name;
            }

            $notice->notice_description = $request->up_notice_description;

            $notice->save();

             // return redirect()->back()->with("success", "Notice Updated Successfull!!");
            return response()->json([
                "status" => "success",
                "msg" => "Data Updated Success"
            ]);
            
        }

        
    }

    //delete post.
    public function deleteNotice(Request $request){
        $delete_notice = Notice::find($request->delete_id);
        
        $delete_notice->delete();            
        //return redirect()->back()->with('success', "Notice deleted Successfull");
        return response()->json([
            "status" => "success",
            "msg" => "Data Delete Success"
        ]);
        
    }

    public function paginationNotice(){
        $notices = Notice::latest()->paginate(3);
        return view("admin.pagination-notice", compact("notices"));   
    }

    public function search(Request $request){
        $notices = Notice::where("notice_title", "like", "%".$request->search_notice. "%")->orWhere("notice_description", "like", "%".$request->search_notice. "%")->orderBy("id", "DESC")->paginate(3);
        
        
        if(empty($notices->count()>=1)){
            return response()->json([
                "status" => "danger",
                "msg" => "Nothing Found",
            ]);
            
        }else{
            return view("admin.pagination-notice", compact("notices"))->render();
        }
    }


         //upload comment method
         public function postComment(Request $request){
            if(Auth::user()->id){
                $comment = new Comment;
                $comment->comment = $request->comment;
                $comment->post_id = $request->notice_id;
                $comment->user_id = Auth::user()->id;
                $comment->save();
                return response()->json([
                    "status" => "success",
                    "msg" => "Data Delete Success"
                ]);
                
            }
        }


        public function allNotices(){
            $notices = Notice::all();
            return view('school.allnotices', compact("notices"));
        }





















    
}
