<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

      //USER
    Route::get("user/index",[UserController::class, 'index']);
    Route::get("user/{id}", [UserController::class, 'show']);
    Route::post("user/create",[UserController::class, 'create']);
    Route::put("user/update/{id}", [UserController::class, 'update']);
    Route::delete("user/delete/{code}", [UserController::class,'delete']);

    //STUDENT
    Route::get("student/index",[StudentController::class, 'index']);
    Route::get("student/{id}", [StudentController::class, 'show']);
    Route::get("student/pivot/{id}", [StudentController::class, 'showPivot']);
    Route::post("student/create",[StudentController::class, 'create']);
    Route::put("student/update/{id}", [StudentController::class, 'update']);
    Route::delete("student/delete/{code}", [StudentController::class,'delete']);

    //ROOM
    Route::get("room/index",[RoomController::class, 'index']);
    Route::get("room/{id}", [RoomController::class, 'show']);
    Route::post("room/create",[RoomController::class, 'create']);
    Route::put("room/update/{id}", [RoomController::class, 'update']);
    Route::delete("room/delete/{code}", [RoomController::class,'delete']);

    //COURSE
    Route::get("course/index",[CourseController::class, 'index']);
    Route::get("course/{id}", [CourseController::class, 'show']);
    Route::post("course/create",[CourseController::class, 'create']);
    Route::put("course/update/{id}", [CourseController::class, 'update']);
    Route::delete("course/delete/{code}", [CourseController::class,'delete']);

    //SUBJECT
    Route::get("subject/index",[SubjectController::class, 'index']);
    Route::get("subject/{id}", [SubjectController::class, 'show']);
    Route::post("subject/create",[SubjectController::class, 'create']);
    Route::put("subject/update/{id}", [SubjectController::class, 'update']);
    Route::delete("subject/delete/{code}", [SubjectController::class,'delete']);
    
    //SECTION
    Route::get("section/index",[SectionController::class, 'index']);
    Route::get("section/{id}", [SectionController::class, 'show']);
    Route::post("section/create",[SectionController::class, 'create']);
    Route::put("section/update/{id}", [SectionController::class, 'update']);
    Route::delete("section/delete/{code}", [SectionController::class,'delete']);
    
    //CLASS
    Route::get("classes/index",[ClassesController::class, 'index']);
    Route::get("classes/{id}", [ClassesController::class, 'show']);
    Route::post("classes/create/{id}",[ClassesController::class, 'create']);
    Route::put("classes/update/{id}", [ClassesController::class, 'update']);
    Route::put("classes/update/student/{id}", [ClassesController::class, 'updateStudent']);
    Route::delete("classes/delete/{code}", [ClassesController::class,'delete']);

    //PERMISSION
    Route::get("permission/index",[PermissionController::class, 'index']);
    Route::get("permission/{id}", [PermissionController::class, 'show']);
    Route::post("permission/create",[PermissionController::class, 'create']);
    Route::put("permission/update/{id}", [PermissionController::class, 'update']);
    Route::delete("permission/delete/{code}", [PermissionController::class,'delete']);

    //ROLE
    Route::put("role/index/{id}",[RoleController::class, 'index']);
    Route::get("role/{id}", [RoleController::class, 'show']);
    Route::post("role/create/{id}",[RoleController::class, 'create']);
    Route::put("role/update/{id}", [RoleController::class, 'update']);
    Route::delete("role/delete/{code}", [RoleController::class,'delete']);

     //GRADE
     Route::get("grade/index",[GradeController::class, 'index']);
     Route::get("grade/{id}", [GradeController::class, 'show']);
     Route::post("grade/create",[GradeController::class, 'create']);
     Route::put("grade/update/{id}", [GradeController::class, 'update']);
     Route::delete("grade/delete/{code}", [GradeController::class,'delete']);



    
    // Route::get("user/add",[UserController::class, 'create']);
    // Route::get("user/edit",[UserController::class, 'update']);
    // Route::get("user/delete",[UserController::class, 'destroy']);
    
