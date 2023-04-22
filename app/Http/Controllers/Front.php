<?php
namespace App\Http\Controllers;

use App\Models\Autentikasi;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class Front extends Controller
{
    public function client() {
        return view('clientLogin');
    }
    
    public function status($status) {
        return view('clientLogin', ['status' => $status]);
    }

    public function konsultan() {
        return view('konsultanLogin');
    }

    public function statusKonsultan($status) {
        return view('konsultanLogin', ['status' => $status]);
    }
}