<?php

use App\Lounge;
use App\MeetingRequest;
use App\Site;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Route::get('/time', function () {
    dd(Carbon::now()->format('Y-m-d H:i') , date_default_timezone_get());
});

Route::get('join-webinar/{webinar}', 'WebController@join_webinar')->name('join-webinar');


Auth::routes(['verify' => true]);
Route::group(['prefix' => 'Auditorium' , 'as' => 'Auditorium.'],function (){
    Route::get('Login','AuditoriumController@Login')->name('Login');
    Route::post('LoginPost','AuditoriumController@LoginPost')->name('LoginPost');
    Route::post('LogOut','AuditoriumController@LogOut')->name('LogOut');
    Route::post('StreamKey','AuditoriumController@StreamKey')->name('StreamKey');
    Route::post('ChangePassword','AuditoriumController@ChangePassword')->name('ChangePassword');
    Route::get('Index','AuditoriumController@Index')->name('Index');
    Route::get('Chats/{ID}','AuditoriumController@Chats')->name('Chats');
    Route::get('ChatGet','AuditoriumController@ChatGet')->name('ChatGet');
    Route::post('/UpdateAvatar', 'AuditoriumController@UpdateAvatar')->name('UpdateAvatar');
    Route::post('/UpdateProfile', 'AuditoriumController@UpdateProfile')->name('UpdateProfile');


});
Route::get('/password/changed','WebController@PassChanged')->name('PassChanged');
Route::get('Verify','WebController@Verify')->name('Verify');

Route::get('ActiveAccount','WebController@ActiveAccount')->name('ActiveAccount');
Route::get('Exhibitor-Register','BoothController@Register')->name('Exhibitor-Register')->middleware('guest');
Route::post('Exhibitor-Register-One','BoothController@RegisterOne')->name('Exhibitor-Register-One')->middleware('guest');
Route::get('Exhibitor-Register-To' , 'BoothController@RegisterTo')->name('Exhibitor-Register-To')->middleware(['auth' , 'Exhibitor' ]);
Route::post('Exhibitor-Register-Two','BoothController@RegisterTwo')->name('Exhibitor-Register-Two')->middleware(['auth' , 'Exhibitor' ]);
Route::get('Exhibitor-Register-Three','BoothController@RegisterThree')->name('Exhibitor-Register-Three')->middleware(['auth' , 'Exhibitor' ]);
Route::put('Exhibitor-Register-ThreePost','BoothController@RegisterThreePost')->name('Exhibitor-Register-ThreePost')->middleware(['auth' , 'Exhibitor' ]);
Route::get('Operator-Register/{TOKEN}','OperatorController@index')->name('OperatorRegister')->middleware('guest');
Route::post('Operator-Register','OperatorController@Register')->name('Operator-Register')->middleware('guest');
Route::get('/', 'WebController@index')->middleware('auth')->name('home');
Route::get('Job/{BoothID}', 'WebController@Jobs')->name('Jobs');
Route::get('/Install', 'WebController@Install');

Route::get('/leave-meeting', 'ExhibitorController@leave_meeting')->name('meeting.leave');


Route::group(['middleware' => ['auth']] , function (){
    Route::group(['prefix' => 'Admin', 'as' => 'Admin.' , 'middleware' => ['Admin']], function () {

        Route::get('/conference/create', 'AdminController@AddConferenceIndex')->name('conference-create');
        Route::post('/conference/create', 'AdminController@AddConferenceAction')->name('conference-create');
        Route::post('/conference/addSpeaker', 'AdminController@AddSpeaker')->name('AddSpeaker');
        Route::post('/conference/UpdateSpeaker', 'AdminController@UpdateSpeaker')->name('UpdateSpeaker');


        Route::get('/', 'AdminController@index');
        Route::get('Auditorium', 'AdminController@Auditorium')->name('Auditorium');
        Route::get('AuditoriumExport', 'AdminController@AuditoriumExport')->name('AuditoriumExport');
        Route::get('AuditoriumPublish', 'AdminController@AuditoriumPublish')->name('AuditoriumPublish');
        Route::post('AuditoriumPost', 'AdminController@AuditoriumPost')->name('AuditoriumPost');
        Route::post('SpeakerPost', 'AdminController@SpeakerPost')->name('SpeakerPost');


        Route::post('/Auditorium/Create', 'AdminController@AuditoriumCreate')->name('AuditoriumCreate');
        Route::get('/Auditorium/Delete/{id?}', 'AdminController@AuditoriumDelete')->name('AuditoriumDelete');





        Route::get('index', 'AdminController@index')->name('index');
        Route::get('BackUp', 'AdminController@BackUp')->name('BackUp');
        Route::get('Export', 'AdminController@Export')->name('Export');
        Route::get('Reset', 'AdminController@Reset')->name('Reset')->middleware(['password.confirm']);
        Route::post('SendMessage', 'AdminController@SendMessage')->name('SendMessage');
        Route::get('InboxChatGet', 'AdminController@InboxChatGet')->name('InboxChatGet');
        Route::get('History', 'AdminController@History')->name('History');
        Route::get('Lounge', 'AdminController@Lounge')->name('Lounge');
        Route::post('SendMessageTpLounge/{LOUNGEID}', 'AdminController@SendMessagetoLounge')->name('SendMessagetoLounge');
        Route::get('Statistics', 'AdminController@Statistics')->name('Statistics');
        Route::get('RegisteredVisitor', 'AdminController@RegisteredVisitor')->name('RegisteredVisitor');
        Route::get('RegisteredExhibitor', 'AdminController@RegisteredExhibitor')->name('RegisteredExhibitor');
        Route::get('RemoveExhibitor/{ID}','AdminController@RemoveExhibitor')->name('RemoveExhibitor');
        Route::get('RemoveSpeaker/{ID}','AdminController@RemoveSpeaker')->name('RemoveSpeaker');

        Route::get('Setting', 'AdminController@Setting')->name('Setting');
        Route::post('SettingPost', 'AdminController@SettingPost')->name('SettingPost');
        Route::post('UserPaid', 'AdminController@UserPaid')->name('UserPaid');
        Route::post('ChangePassword', 'AdminController@ChangePassword')->name('ChangePassword');
        Route::get('Gallery', 'AdminController@Gallery')->name('Gallery');
        Route::get('Signin', 'AdminController@Signin')->name('Signin');
        Route::get('VisitorSetting', 'AdminController@VisitorSetting')->name('VisitorSetting');
        Route::post('CreateLounge', 'AdminController@CreateLounge')->name('CreateLounge');
        Route::get('RemoveLounge/{ID}', 'AdminController@RemoveLounge')->name('RemoveLounge');
        Route::get('RemoveLoungeWithUrl/{ID}', 'AdminController@RemoveLoungeWithUrl')->name('RemoveLoungeWithUrl');
        Route::post('VisitorSettingPost', 'AdminController@VisitorSettingPost')->name('VisitorSettingPost');
        Route::get('ExhibitorSetting', 'AdminController@ExhibitorSetting')->name('ExhibitorSetting');
        Route::post('ExhibitorSettingPost', 'AdminController@ExhibitorSettingPost')->name('ExhibitorSettingPost');
        Route::get('AppAdjustment', 'AdminController@AppAdjustment')->name('AppAdjustment');
        Route::post('AppAdjustmentPost', 'AdminController@AppAdjustmentPost')->name('AppAdjustmentPost');
        Route::post('SigninPost', 'AdminController@SigninPost')->name('SigninPost');
        Route::get('SuspendUser/{ID}', 'AdminController@SuspendUser')->name('SuspendUser');
        Route::get('SuspendUserWithUrl/{ID}', 'AdminController@SuspendUserWithUrl')->name('SuspendUserWithUrl');
        Route::get('SuspendBooth/{ID}', 'AdminController@SuspendBooth')->name('SuspendBooth');





        Route::get('CompanyList','AdminController@CompanyList')->name('CompanyList');
        Route::get('UserList','AdminController@UserList')->name('UserList');
        Route::get('ChatCount','AdminController@ChatCount')->name('ChatCount');
        Route::get('ChangeChatStatus','AdminController@ChangeChatStatus')->name('ChangeChatStatus');






    });
    Route::group(['prefix' => 'AdminOperator', 'as' => 'AdminOperator.','middleware' => ['AdminOperator']], function () {
        Route::post('UserPaid', 'AdminController@UserPaid')->name('UserPaid');
        Route::get('/', 'AdminOperatorController@index')->name('index');
        Route::get('/index', 'AdminOperatorController@index')->name('index');
        Route::get('InboxChatGet', 'AdminController@InboxChatGet')->name('InboxChatGet');

        Route::get('/Statistics', 'AdminOperatorController@Statistics')->name('Statistics');
        Route::get('/History', 'AdminOperatorController@History')->name('History');
        Route::get('Lounge', 'AdminOperatorController@Lounge')->name('Lounge');
        Route::post('SendMessageTpLounge/{LOUNGEID}', 'AdminOperatorController@SendMessagetoLounge')->name('SendMessagetoLounge');
        Route::get('Statistics', 'AdminOperatorController@Statistics')->name('Statistics');
        Route::get('RegisteredVisitor', 'AdminOperatorController@RegisteredVisitor')->name('RegisteredVisitor');
        Route::get('RegisteredExhibitor', 'AdminOperatorController@RegisteredExhibitor')->name('RegisteredExhibitor');
        Route::get('Setting', 'AdminOperatorController@Setting')->name('Setting');
        Route::post('SettingPost', 'AdminOperatorController@SettingPost')->name('SettingPost');


        Route::get('SuspendUser/{ID}', 'AdminOperatorController@SuspendUser')->name('SuspendUser');
        Route::get('SuspendBooth/{ID}', 'AdminOperatorController@SuspendBooth')->name('SuspendBooth');
        Route::get('SuspendUserWithUrl/{ID}', 'AdminOperatorController@SuspendUserWithUrl')->name('SuspendUserWithUrl');

        Route::get('/ContactUs', 'AdminOperatorController@ContactUs')->name('ContactUs');
        Route::post('/UpdateAvatar', 'AdminOperatorController@UpdateAvatar')->name('UpdateAvatar');
        Route::post('/ChangePassword', 'AdminOperatorController@ChangePassword')->name('ChangePassword');
        Route::post('SendMessage', 'AdminOperatorController@SendMessage')->name('SendMessage');
        Route::get('ChatGet', 'AdminOperatorController@ChatGet')->name('ChatGet');




        Route::get('CompanyList','AdminOperatorController@CompanyList')->name('CompanyList');
        Route::get('UserList','AdminOperatorController@UserList')->name('UserList');
        Route::get('ChatCount','AdminOperatorController@ChatCount')->name('ChatCount');
        Route::get('ChangeChatStatus','AdminOperatorController@ChangeChatStatus')->name('ChangeChatStatus');





    });
    Route::group(['prefix' => 'Visitor', 'as' => 'Visitor.','middleware' => ['Visitor']], function () {
        Route::get('/', 'VisitorController@index')->name('index');
        Route::get('/index', 'VisitorController@index')->name('index');
        Route::post('/UpdateAvatar', 'VisitorController@UpdateAvatar')->name('UpdateAvatar');
        Route::post('/ChangePassword', 'VisitorController@ChangePassword')->name('ChangePassword');
        Route::post('/VisitExperience', 'VisitorController@VisitExperience')->name('VisitExperience');
        Route::get('/VisitHistory', 'VisitorController@VisitHistory')->name('VisitHistory');
        Route::get('/Payment', 'VisitorController@Payment')->name('Payment');
        Route::get('/Contact', 'VisitorController@Contact')->name('Contact');
        Route::post('/Resume', 'VisitorController@Resume')->name('Resume');
        Route::post('/Chat', 'VisitorController@Chat')->name('Chat');
        Route::get('ChatGet', 'VisitorController@ChatGet')->name('ChatGet');


        Route::get('/MeetingSchedule/{company_id?}', "VisitorController@MeetingScheduleIndex")->name('visitor-meetingSchedule');

        Route::get('/Meetings', 'VisitorController@MeetingsIndex' )->name('visitor-meetings');


        Route::get('join-meeting/{meeting}', 'VisitorController@join_meeting')->name('meeting.join');
        Route::get('leave-meeting', 'VisitorController@leave_meeting')->name('meeting.leave');



    });



    Route::group(['prefix' => 'Exhibitor', 'as' => 'Exhibitor.','middleware' => ['Exhibitor']], function () {
        Route::get('/', 'ExhibitorController@index')->name('index');
        Route::get('/index', 'ExhibitorController@index')->name('index');
        Route::get('/MyBooth', 'ExhibitorController@MyBooth')->name('MyBooth');
        Route::get('/Inbox', 'ExhibitorController@Inbox')->name('Inbox');
        Route::get('/Statistics', 'ExhibitorController@Statistics')->name('Statistics');
        Route::get('/History', 'ExhibitorController@History')->name('History');
        Route::get('/Payment', 'ExhibitorController@Payment')->name('Payment');
        Route::get('/Confirmation', 'ExhibitorController@Confirmation')->name('Confirmation');
        Route::get('/ContactUs', 'ExhibitorController@ContactUs')->name('ContactUs');
        Route::post('/AddJob', 'ExhibitorController@AddJob')->name('AddJob');
        Route::post('/Chat', 'ExhibitorController@Chat')->name('Chat');
        Route::get('ChatGet', 'ExhibitorController@ChatGet')->name('ChatGet');
        Route::post('/ChatAdmin', 'ExhibitorController@ChatAdmin')->name('ChatAdmin');
        Route::post('/UpdateBooth', 'ExhibitorController@UpdateBooth')->name('UpdateBooth');
        Route::post('/AboutCompany', 'ExhibitorController@AboutCompany')->name('AboutCompany');
        Route::post('/UpdateAvatar', 'ExhibitorController@UpdateAvatar')->name('UpdateAvatar');
        Route::post('/ChangePassword', 'ExhibitorController@ChangePassword')->name('ChangePassword');
        Route::get('/DeleteJob/{JobID}', 'ExhibitorController@DeleteJob')->name('DeleteJob');
        Route::put('/UpdateJob', 'ExhibitorController@UpdateJob')->name('UpdateJob');
        Route::get('InboxGet' , 'ExhibitorController@InboxGet')->name('InboxGet');
        Route::get('ChangeChatStatus','ExhibitorController@ChangeChatStatus')->name('ChangeChatStatus');
        Route::post('InboxPost' , 'ExhibitorController@InboxPost')->name('InboxPost');
        Route::get('GetUsers' , 'ExhibitorController@GetUsers')->name('GetUsers');
        Route::get('ChatCount' , 'ExhibitorController@ChatCount')->name('ChatCount');
        Route::get('ChangeChatStatus','ExhibitorController@ChangeChatStatus')->name('ChangeChatStatus');



        Route::get('/MeetingSchedule', 'ExhibitorController@MeetingScheduleIndex')->name('MeetingSchedule');
        Route::get('/MeetingActivateTime/{day?}/{time?}', 'ExhibitorController@MeetingActivateTime')->name('MeetingActivateTime');
        Route::get('/MeetingDeActivate/{day?}/{time?}', 'ExhibitorController@MeetingDeActivateTime')->name('MeetingDeActivateTime');
        Route::get('/Meeting/RejectUser/{meeting_id?}', 'ExhibitorController@RejectMeeting')->name('MeetingReject');
        Route::get('/Meeting/AcceptUser/{meeting_id?}', 'ExhibitorController@MeetingAccept')->name('MeetingAccept');




        Route::get('/AddConference', 'ExhibitorController@AddConferenceIndex')->name('AddConference');
        Route::post('/AddConferenceFinalize', 'ExhibitorController@AddConferenceFinalize')->name('FinalizeConference');
        Route::post('/AddConferenceSpeaker', 'ExhibitorController@AddConferenceSpeaker')->name('AddSpeaker');



        Route::get('join-meeting/{meeting}', 'ExhibitorController@join_meeting')->name('meeting.join');


        Route::get('create-webinar/{conference}', 'ExhibitorController@create_webinar')->name('create-webinar');



    });






    Route::group(['prefix' => 'ExhibitorOperator', 'as' => 'ExhibitorOperator.','middleware' => ['ExhibitorOperator']], function () {
        Route::get('/', 'ExhibitorOperatorController@index')->name('index');
        Route::get('/index', 'ExhibitorOperatorController@index')->name('index');
        Route::get('/inbox', 'ExhibitorOperatorController@inbox')->name('inbox');
        Route::get('/Statistics', 'ExhibitorOperatorController@Statistics')->name('Statistics');
        Route::get('/History', 'ExhibitorOperatorController@History')->name('History');
        Route::get('/ContactUs', 'ExhibitorOperatorController@ContactUs')->name('ContactUs');
        Route::post('/Chat', 'ExhibitorOperatorController@Chat')->name('Chat');
        Route::get('ChatGet', 'ExhibitorOperatorController@ChatGet')->name('ChatGet');
        Route::post('/ChatAdmin', 'ExhibitorOperatorController@ChatAdmin')->name('ChatAdmin');
        Route::post('/UpdateAvatar', 'ExhibitorOperatorController@UpdateAvatar')->name('UpdateAvatar');
        Route::post('/ChangePassword', 'ExhibitorOperatorController@ChangePassword')->name('ChangePassword');
        Route::get('InboxGet' , 'ExhibitorOperatorController@InboxGet')->name('InboxGet');
        Route::post('InboxPost' , 'ExhibitorOperatorController@InboxPost')->name('InboxPost');
        Route::get('GetUsers' , 'ExhibitorOperatorController@GetUsers')->name('GetUsers');
        Route::get('ChatCount' , 'ExhibitorOperatorController@ChatCount')->name('ChatCount');
        Route::get('ChangeChatStatus','ExhibitorOperatorController@ChangeChatStatus')->name('ChangeChatStatus');

    });



    Route::get('Auditorium','WebController@Auditorium')->name('Auditorium');
    Route::get('AuditoriumPlay/{ID}','WebController@AuditoriumPlay')->name('AuditoriumPlay');
    Route::get('Lounge','LoungeController@index')->name('Lounge');
    Route::post('LoungeChat','LoungeController@Chat')->name('LoungeChat')->middleware(['auth']);


});

Route::get('video/{ID}', 'WebController@video');
//change site lang
Route::get('locale/{locale}', 'WebController@SetLocale');




