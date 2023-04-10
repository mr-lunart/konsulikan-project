<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UserAuth
{

    protected $fill = [
        'id',
        'nama',
        'user',
        'pass'
    ];

    public static function DB_GET()
    {
        $customer = DB::select('select * from customer');
        return($customer);
    }
}

?>