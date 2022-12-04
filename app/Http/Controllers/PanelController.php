<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{

    public function check_adm(Request $r) {
        if (!$r->session()->has('admin_auth')) abort(404);
        $data = $r->session()->get('admin_auth');
        if (
            ENV('ADMIN_LOGIN', 'blek') != $data[0] ||
            ENV('ADMIN_PASSW', '') != $data[1]
        ) {
            request()->session()->forget('admin_auth');
            abort(404);
        }
    }

    public function index(Request $r) {
        $this->check_adm($r);
        if (isset($_GET['_token'])) return $this->action();
        if (isset($_GET['new'])) return redirect()->to('/panel/new');
        if (isset($_GET['migrate'])) return redirect()->to('/panel/migrate');
        
        $data = DB::table('blog')
            ->get();
        
        return view('panel', array('data' => $data));
    }

    protected function action() {
        
        $this->check_adm(request());
        if (!isset($_GET['id'])) abort(400);

        if (isset($_GET['hide'])) {
            $code = DB::table('blog')
                ->where('id', $_GET['id'])
                ->update(array(
                    'hidden' => DB::raw('not hidden')
                ));
            if (!$code) {
                // well then its too fucking sad
            }
        }

        if (isset($_GET['del'])) {
            DB::table('blog')
                ->where('id', $_GET['id'])
                ->delete();
        }

        if (isset($_GET['edit'])) {
            $data = DB::table('blog')->where('id', $_GET['id'])->get();
            return view('new_blog', (array) $data[0]);
        }
        return redirect()->to('/panel');
    }

    public function show(Request $r, string $path) {
        if (method_exists($this, $path)) return $this->{$path}();
        else abort(404);
    }

    protected function new() {
        if (isset($_GET['_token'])) {

            if (isset($_GET['id'])) {
                DB::table('blog')
                    ->where('id', $_GET['id'])
                    ->update(array(
                        'title' => $_GET['title'],
                        'author' => $_GET['author'],
                        'body' => $_GET['text']
                    ));
                    return redirect()->to('/panel');
            } else 
                DB::table('blog')
                    ->insert(array(
                        'title' => $_GET['title'],
                        'author' => $_GET['author'],
                        'body' => $_GET['text'],
                        'time' => time(),
                        'hidden' => false
                    ));

            return redirect()->to('/panel');
        }
        return view('new_blog');
    }

    protected function migrate() {
        return view('migrated', array('output' => Artisan::call('migrate:refresh', array('--force' => true))));
    }
}
