<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

Route::get('/', function () {

    $announce = json_decode(file_get_contents(public_path() . '/announce.json'));

    return view('welcome', array(
        'announce' => $announce
    ));
});

Route::get('/about', function(Request $r) {
    return view('about');
});

Route::get('/projects', function(Request $r) {
    return view('projects');
});

Route::get('/blog', function (Request $r) {
    return view('blog', array('data' => DB::table('blog')->where('hidden', false)->orderBy('id', 'asc')->get()));
});

Route::get('/blog/{id}', function (Request $r, string $id) {
    if (is_numeric($id)) {
        return view('blog_post', array(
            'data' => DB::table('blog')->where('id', intval($id))->get()[0]
        ));
    }
    return view('blog_port', array(
        'data' => DB::table('blog')->where('title', str_replace('_', ' ', $id))->get()[0]
    ));
});

Route::get('/login', function (Request $r) {
    if (isset($_GET['1'])) {
        if (ENV('ADMIN_LOGIN', 'blek') != $_GET['1']) return;
        if (Hash::check(ENV('ADMIN_PASSW'), Hash::make($_GET['2']))) return;
        $r->session()->put('admin_auth', array($_GET['1'], Hash::make($_GET['2'])));
        return redirect()->to('/panel')
            // Dont save this in history
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
            ->header('Expires', 'Sun, 2 Sep 1666 19:30:00 GMT');
    }
    return view('panel_login');
});

Route::get('/webs', function (Request $r) {
    return redirect()->back();
});

Route::get('/project/{id}', function (Request $r, string $id) {
    if (view()->exists("project/$id"))
        return view("project/$id");
    abort(404);
});

Route::apiResource('/guestbook', \App\Http\Controllers\GuestbookController::class);
Route::apiResource('/panel', \App\Http\Controllers\PanelController::class);