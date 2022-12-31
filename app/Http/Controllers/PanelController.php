<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PanelController extends Controller
{

    public function check_adm(Request $r) {
        if (!$r->session()->has('admin_auth')) abort(404);
        $data = $r->session()->get('admin_auth');
        if (ENV('ADM_LOGIN', 'blek') != $data[0] ||
            !Hash::check(ENV('ADM_PASSW', 'banana'), $data[1])) {exit($data[1]);
            $r->session()->forget('admin_auth');
        }
        return true;
    }

    public function index(Request $r) {
        $this->check_adm($r);
        if (isset($_GET['_token'])) return $this->action();
        if (isset($_GET['new'])) return redirect()->to('/panel/new');
        if (isset($_GET['migrate'])) return redirect()->to('/panel/migrate');
        
        $data = DB::table('blog')
            ->orderBy('id', 'asc')
            ->get();
        
        $gb = DB::table('guestbook')
            ->orderBy('id', 'asc')
            ->get();
        
        return view('panel', array('data' => $data, 'gb' => $gb));
    }

    protected function action() {
        
        $this->check_adm(request());
        if (!isset($_GET['id'])) abort(400);

        if (isset($_GET['hide'])) {
            DB::table('blog')
                ->where('id', $_GET['id'])
                ->update(array(
                    'hidden' => DB::raw('not hidden')
                ));
        }

        if (isset($_GET['del'])) {
            DB::table('blog')
                ->where('id', $_GET['id'])
                ->delete();
        }

        if (isset($_GET['edit'])) {
            $data = DB::table('blog')->where('id', $_GET['id'])->get();
            return view('new_blog', array_merge(array('edit' => true), (array) $data[0]));
        }
        return redirect()->to('/panel');
    }

    public function gb_action() {
        /* $data = DB::table('guestbook')
            ->where('id', $_GET['id'])
            ->get(); */
        
        if (isset($_GET['del'])) {
            DB::table('guestbook')
                ->where('id', $_GET['id'])
                ->delete();
            return redirect()->to('/panel');
        }
        
        if (isset($_GET['hide'])) {
            DB::table('guestbook')
                ->where('id', $_GET['id'])
                ->update(array(
                    'hidden' => DB::raw('not hidden')
                ));
            return redirect()->to('/panel');
        }

        abort(400);
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
        $this->check_adm(request());
        return view('migrated', array('output' => \Illuminate\Support\Facades\Artisan::call('migrate:refresh', array('--force' => true))));
    }
}
