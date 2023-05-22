<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\SessionDB;

class Sesi extends Controller
{
    public function setSesi() {
        $session = new SessionDB();
        $uid = session('query')[0] -> uid;
        $sesi = $session -> getSessionClient($uid);
        return view('sessionList',['query' => $sesi]);
    }
}
