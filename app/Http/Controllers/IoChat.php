<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Io;

class IoChat extends Controller
{
    public function io()
    {

        $data = $_POST;
        // return response()->json(['success'=>$data]);
        return response($data["pesan"]);
        
    }
}
?>