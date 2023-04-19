<?php

namespace App\Http\Controllers;
use App\Models\Konsultan;

class HalamanKonsultan extends Controller
{

    public static function listKonsul ()
    {
        $konsultan = new Konsultan();
        $data= $konsultan->getKonsultan();
        return view('page.konsultan-hub', ['data' => $data]);
    }
}

?>