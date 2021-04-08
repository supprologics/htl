<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiteController@welcome')->name('welcome');
Route::get('/welcome', 'SiteController@welcome');
Route::post('/subjects-all', 'SiteController@subjects')->name('site.subjects');
Route::get('/about', 'SiteController@about')->name('site.about');
Route::get('/subject/{subject}', 'SiteController@subject')->name('site.subject');

Auth::routes();

Route::group(['middleware' => 'role:1'], function () {
    
    Route::get('/home-admin', 'HomeController@adminindex')->name('admin.home');

    Route::get('/grade','GradeController@index')->name('grade.index');
    Route::get('/grade-getdata','GradeController@getdata')->name('grade.getdata');
    Route::post('/grade/add','GradeController@add')->name('grade.add');
    Route::post('/grade/edit','GradeController@edit')->name('grade.edit');
    Route::post('/grade/delete','GradeController@delete')->name('grade.delete');

    Route::get('/subject','SubjectController@index')->name('subject.index');
    Route::get('/subject-getdata','SubjectController@getdata')->name('subject.getdata');
    Route::post('/subject/add','SubjectController@add')->name('subject.add');
    Route::post('/subject/edit','SubjectController@edit')->name('subject.edit');
    Route::post('/subject/delete','SubjectController@delete')->name('subject.delete');

    Route::get('/referencedoc/{subject}','SubjectReferencesDocController@docindex')->name('referencedoc.index');
    Route::get('/referencedoc-getdata/{id}','SubjectReferencesDocController@docgetdata')->name('referencedoc.getdata');
    Route::post('/referencedoc/add','SubjectReferencesDocController@docadd')->name('referencedoc.add');
    Route::post('/referencedoc/edit','SubjectReferencesDocController@docedit')->name('referencedoc.edit');
    Route::post('/referencedoc/delete','SubjectReferencesDocController@docdelete')->name('referencedoc.delete');

    Route::get('/referencetype','SubjectReferencesTypeController@typeindex')->name('referencetype.typeindex');
    Route::get('/referencetype-getdata','SubjectReferencesTypeController@typegetdata')->name('referencetype.getdata');
    Route::post('/referencetype/add','SubjectReferencesTypeController@typeadd')->name('referencetype.add');
    Route::post('/referencetype/edit','SubjectReferencesTypeController@typeedit')->name('referencetype.edit');
    Route::post('/referencetype/delete','SubjectReferencesTypeController@typedelete')->name('referencetype.delete');
    
    Route::get('/medium','LanguageController@index')->name('medium.index');
    Route::get('/medium-getdata','LanguageController@getdata')->name('medium.getdata');
    Route::post('/medium/add','LanguageController@add')->name('medium.add');
    Route::post('/medium/edit','LanguageController@edit')->name('medium.edit');
    Route::post('/medium/delete','LanguageController@delete')->name('medium.delete');

    Route::get('/section/{subject}','SectionController@index')->name('section.index');
    Route::get('/section-getdata/{id}','SectionController@getdata')->name('section.getdata');
    Route::post('/section/add','SectionController@add')->name('section.add');
    Route::post('/section/edit','SectionController@edit')->name('section.edit');
    Route::post('/section/delete','SectionController@delete')->name('section.delete');

    Route::get('/lecturer','LecturerController@index')->name('lecturer.index');
    Route::get('/lecturer-getdata','LecturerController@getdata')->name('lecturer.getdata');
    Route::post('/lecturer/add','LecturerController@add')->name('lecturer.add');
    Route::post('/lecturer/edit','LecturerController@edit')->name('lecturer.edit');
    Route::post('/lecturer/delete','LecturerController@delete')->name('lecturer.delete');

    Route::get('/lecturer-sub/{lecturer}','LecturerController@lecsubjectsindex')->name('lecturer.lecsubjectsindex');
    Route::get('/lecturer-sub-getdata/{lecturer}','LecturerController@lecsubgetdata')->name('lecturer.lecsubgetdata');
    Route::post('/lecturer/subject','LecturerController@subject')->name('lecturer.subject');

    
    Route::get('/lessons-waiting','LecturerLessonController@lessonapprove')->name('lecturer.lessonapprove');
    Route::get('/lessons-waiting-getdata','LecturerLessonController@lessonapprove_getdata')->name('lecturer.lessonapprove_getdata');
    Route::post('/lesson-approve','LecturerController@approve')->name('lesson.approve');
    Route::post('/lesson-reject','LecturerController@reject')->name('lesson.reject');

    
    Route::get('/enrolled-students','StudentController@enrolled_stu')->name('enrolled.students');
    Route::get('/enrolled-students-getdata','StudentController@enrolled_stu_getdata')->name('enrolled.stu_getdata');
});

Route::group(['middleware' => 'role:2'], function () {
    
    Route::get('/home-lecturer', 'HomeController@lecturerindex')->name('lecturer.home');

    Route::get('/mysubject/{subject}','LecturerSubjectController@subject')->name('lecturer.mysubject');
    
    Route::get('/lesson-content/{lesson}','LecturerLessonController@lesson')->name('lecturer.lesson');
    Route::post('/lesson-newlesson','LecturerLessonController@newlesson')->name('lecturer.newlesson');
    Route::post('/lesson-upload', 'LecturerLessonController@upload')->name('lecturer.upload');
    Route::post('/lesson-content-upload', 'LecturerLessonController@content_upload')->name('lesson-content.update');
    Route::post('/lesson-content-delete', 'LecturerLessonController@lesson_delete')->name('lesson-content.delete');
    Route::post('/lesson-status', 'LecturerLessonController@status')->name('lesson.status');
    Route::post('/lesson-getstatus', 'LecturerLessonController@getstatus')->name('lesson.getstatus');
    
    Route::post('/lesson-attachadd', 'LecturerLessonController@attachadd')->name('lesson.attachadd');
    Route::post('/lesson-attach/delete','LecturerLessonController@attachdelete')->name('lessonattach.delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'HomeController@profile')->name('user.profile');
    Route::post('/profile-update', 'HomeController@profileupdate')->name('profile.update');
    Route::get('getfile/{id}', 'SubjectReferencesDocController@getfile')->name('getfile');
    Route::get('get-lessonattach/{attach}', 'LecturerLessonController@getfile')->name('get.lessonattach');
    Route::get('/forum', 'ForumController@forums')->name('forum.index');
    Route::get('/topic/{id}', 'ForumController@topic')->name('forum.topic');
    Route::post('/topic-add', 'ForumController@topicadd')->name('forum.topicadd');
    Route::post('/topic-edit', 'ForumController@topicedit')->name('forum.topicedit');
    Route::post('/topic-reply', 'ForumController@addreply')->name('forum.addreply');
    Route::post('/topic-hide', 'ForumController@hide')->name('forum.hide');
    
    Route::post('/assignment-add', 'AssignmentController@add')->name('assignment.add');
    Route::post('/assignment-edit', 'AssignmentController@edit')->name('assignment.edit');
    Route::post('/assignment-hide', 'AssignmentController@hide')->name('assignment.hide');
    Route::get('get-assignmentattach/{assignment}', 'AssignmentController@getfile')->name('get.assignmentattach');
    Route::post('/assignment-answer', 'AssignmentController@answer')->name('assignment.answer');
    Route::get('/assignment-answer-view/{assignment}', 'AssignmentController@answersview')->name('assignment.answersview');
    Route::get('/assignment-answer-file/{answer}', 'AssignmentController@answerattach')->name('assignment.answerattach');
    Route::post('/assignment-answer-marked', 'AssignmentController@marked')->name('assignment.marked');
    Route::get('/library', 'LibraryController@subjects')->name('library.subjects');
    Route::get('/library-subject/{id}', 'LibraryController@subjectfile')->name('library.subjectfiles');
});

Route::get('/verify-student','Auth\RegisterController@verifyEmail')->name('verifyemail');
Route::post('/password-reset-mail','Auth\RegisterController@passwordresetmail')->name('password.resetmail');
Route::post('/resend-verify-mail','Auth\RegisterController@resendverify')->name('resend.verify');
Route::get('/password-reset','Auth\RegisterController@passwordreset')->name('password.reset');
Route::post('/password-update','Auth\RegisterController@passwordupdate')->name('password.update');
Route::post('/enroll-subject', 'StudentController@enrollsubject')->name('enroll.subject');
Route::get('/enroll-subject-web', 'StudentController@enrollsubjectweb')->name('enroll.subjectweb');

Route::group(['middleware' => 'role:3'], function () {
        
    Route::get('/home-student', 'HomeController@studentindex')->name('student.home');
    Route::get('/medium-grade', 'StudentController@mediumandgrade')->name('mediumandgrade');
    Route::post('/preferences-update', 'StudentController@preferencesupdate')->name('preferencesupdate');
    Route::get('/related-subjects', 'StudentController@relatedsubjects')->name('related.subjects');
    Route::get('/my-subjects', 'StudentController@mysubjects')->name('my.subjects');
    
    Route::get('/my-subject/{subject}','StudentController@subject')->name('student.mysubject');
    Route::get('/lesson-main-content/{lesson}','StudentController@lesson')->name('student.lesson');

});
