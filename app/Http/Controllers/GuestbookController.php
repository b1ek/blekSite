<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestbookController extends Controller
{
    public function index() {
        if (isset($_GET['_token'])) {

            if ($_GET['email'] == '') $_GET['email'] = 'null';

            request()->validate(array(
                'name' => 'required|string',
                'email' => 'email:rfc,dns|nullable',
                'text' => 'required|string|max:1000',
            ));

            DB::table('guestbook')
                ->insert(array(
                    'name' => $_GET['name'],
                    'email' => $_GET['email'],
                    'text' => $_GET['text'],
                    'hidemail' => isset($_GET['hide_email']) ? $_GET['hide_email'] == 'on' : $_GET['email'] == 'null',
                    'ip' => request()->ip(),
                    'hidden' => false,
                    'time' => time()
                ));
            return redirect()->to('/guestbook');
        }
        $data = $this->prepare_data();
        if ($data) return view('guestbook', array('data' => $data));
        return view('guestbook');
    }

    protected function prepare_data() {
        return DB::table('guestbook')
            ->where('hidden', false)
            ->get();
    }

    protected function del(string $path) {
        $id = intval(substr($path, 4));
        $res = DB::table('guestbook')
            ->where('id', $id)
            ->delete();
        if (!$res)
            return redirect()->to('/guestbook')->withErrors(array('Database action failed'));
        return redirect()->to('/guestbook');
    }

    public function show(string $path) {
        if (str_starts_with($path, 'del_')) {
            return $this->del($path);
        }
    }
}
