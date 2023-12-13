<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StudentController::class, "index"])->name('student.index');
Route::get('/about', [StudentController::class, "about"])->name('student.about');
Route::get('/notices', [StudentController::class, "allNotices"])->name('student.all.notices');
Route::get('/admission', [StudentController::class, "admission"])->name('student.admission');
Route::get('/contact', [StudentController::class, "contact"])->name('student.contact');
Route::get('/course', [StudentController::class, "course"])->name('student.course');
Route::get('/course-single', [StudentController::class, "courseSingle"])->name('student.course.single');
Route::get('/single_notice/{id}', [StudentController::class, "singleNotice"])->name('student.notice.single');


//login, register, dashboard
Route::post('/loginUser', [StudentController::class, "loginUser"])->name('student.login.user');

//authenticated user cannot go to the login page.
Route::group(['middleware'=>'redirectifauthenticated'], function(){
    Route::get('/login', [StudentController::class, 'login'])->name('student.login');
    Route::get('/register', [StudentController::class, "register"])->name('student.register');
});





Route::get('/logoutUser', [StudentController::class, "logoutUser"])->name('student.logout');
Route::post('/registerUser', [StudentController::class, "registerUser"])->name('student.register.user');

Route::get('/ad-dashboard', [StudentController::class, "dashboard"])->name('admin.dash');
Route::get('/ad-dashboard/teachers', [StudentController::class, "teachers"])->name('admin.teachers');
Route::get('/ad-dashboard/staff', [StudentController::class, "staff"])->name('admin.staff');
Route::get('/ad-dashboard/students', [StudentController::class, "students"])->name('admin.students');





//teacher member trash page
Route::get('/ad-dashboard/teachers/trash', [StudentController::class, 'teacherTrashPage'])->name('teacher.trash.page');

// trash any team member with this url
Route::get('/ad-dashboard/teachers/trash/{id}', [StudentController::class, 'teacherTrash'])->name('trash.teacher');

//restore any team member data from trash page
Route::get('/ad-dashboard/teachers/trash/restore/{id}', [StudentController::class, 'teacherRestore'])->name('teacher.restore');

//delete permanently a team member data from website and database too.
Route::get('/ad-dashboard/teachers/trash/force_delete/{id}', [StudentController::class, 'teacherForceDelete'])->name('teacher.delete');


//change teacher or student status(Block, or active)
Route::get('/ad-dashboard/teachers/{status}/{id}', [StudentController::class, 'changeUserStatus'])->name('change.status');




//staff member trash page
Route::get('/ad-dashboard/staff/trash', [StudentController::class, 'staffTrashPage'])->name('staff.trash.page');

// trash any team member with this url
Route::get('/ad-dashboard/staff/trash/{id}', [StudentController::class, 'staffTrash'])->name('trash.staff');

//restore any team member data from trash page
Route::get('/ad-dashboard/staff/trash/restore/{id}', [StudentController::class, 'staffRestore'])->name('staff.restore');

//delete permanently a team member data from website and database too.
Route::get('/ad-dashboard/staff/trash/force_delete/{id}', [StudentController::class, 'staffForceDelete'])->name('staff.delete');


//change teacher or student status(Block, or active)
Route::get('/ad-dashboard/staff/{status}/{id}', [StudentController::class, 'changeStaffStatus'])->name('change.status.staff');









//staff member trash page
Route::get('/ad-dashboard/student/trash', [StudentController::class, 'studentTrashPage'])->name('student.trash.page');

// trash any team member with this url
Route::get('/ad-dashboard/student/trash/{id}', [StudentController::class, 'studentTrash'])->name('trash.student');

//restore any team member data from trash page
Route::get('/ad-dashboard/student/trash/restore/{id}', [StudentController::class, 'studentRestore'])->name('student.restore');

//delete permanently a team member data from website and database too.
Route::get('/ad-dashboard/student/trash/force_delete/{id}', [StudentController::class, 'studentForceDelete'])->name('student.delete');


//change teacher or student status(Block, or active)
Route::get('/ad-dashboard/student/{status}/{id}', [StudentController::class, 'changeStudentStatus'])->name('change.status.student');


Route::get('/ad-dashboard/notice', [StudentController::class, 'notice'])->name('admin.notice');

//user notice upload 
Route::post('/ad-dashboard/notice/upload',[StudentController::class, 'uploadNotice'])->name('notice.upload');
//user notice update
Route::post('/ad-dashboard/notice/update',[StudentController::class, 'updateNotice'])->name('update.notice');
//user notice delete
Route::post('/ad-dashboard/notice/delete',[StudentController::class, 'deleteNotice'])->name('delete.notice');

Route::get('/ad-dashboard/notice/paginate/paginate-data',[StudentController::class, 'paginationNotice']);

Route::get('/ad-dashboard/notice/search',[StudentController::class, 'search'])->name('search.notice');

Route::post('/single_notice/add_comment',[StudentController::class, 'postComment'])->name('comment.upload');
















