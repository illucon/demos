<?php
 
/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function(){ 
  return view('admin.pages.home');
});

Route::get('/new-admission', 'StudentController@new_admission');
Route::post('/save-student', 'StudentController@save_student');
Route::get('/student-list', 'StudentController@student_list');


Route::get('/classes', 'AcademicManagementController@class_management');
Route::post('/add-class', 'AcademicManagementController@add_class');
Route::get('/ajax-edit-view-{id}', 'AcademicManagementController@ajax_edit_view');
Route::post('/update-class', 'AcademicManagementController@update_class');
Route::get('/delete-class-{id}', 'AcademicManagementController@delete_class');
Route::get('/sections', 'AcademicManagementController@sections');
Route::post('/add-section', 'AcademicManagementController@add_section');
Route::get('/subjects', 'AcademicManagementController@subjects');
Route::post('/add-subject', 'AcademicManagementController@add_subject');
Route::get('/years', 'AcademicManagementController@years');
Route::post('/add-year', 'AcademicManagementController@add_year');


Route::get('/grade-setting', 'ExamResultsController@grade_setting');
Route::post('/add-grade', 'ExamResultsController@add_grade');
Route::get('/exam-type', 'ExamResultsController@exam_type');
Route::post('/add-exam_type', 'ExamResultsController@add_exam_type');
Route::get('/exams', 'ExamResultsController@exams');
Route::post('/add-new-exam', 'ExamResultsController@add_new_exam');
Route::get('/mark-entries', 'ExamResultsController@mark_entries');
Route::get('/ajax-view-section', 'ExamResultsController@ajax_view_section');
Route::get('/ajax-view-marks', 'ExamResultsController@ajax_view_marks');
Route::post('/mark-entry-by-section', 'ExamResultsController@mark_entry_by_section');
Route::post('/save-mark-entry-by-section', 'ExamResultsController@save_mark_entry_by_section');

Route::get('/result-by-student-all-exam', 'ExamResultsController@result_by_student_all_exam');
Route::get('/ajax-view-student', 'ExamResultsController@ajax_view_student');
Route::get('/ajax-view-single-student-result', 'ExamResultsController@ajax_view_single_student_result');
Route::get('/section-exam-result', 'ExamResultsController@section_exam_result');
Route::get('/ajax-view-section-exam-result', 'ExamResultsController@ajax_view_section_exam_result');
Route::get('/student-exam-result-{std}-{exm}', 'ExamResultsController@student_exam_result');



Route::get('/test', 'ExamResultsController@test');
