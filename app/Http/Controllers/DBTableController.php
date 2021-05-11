<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DBTableController extends Controller
{
    public function display($name) {
        $tables = [
            "customers",
            "orders",
            "payments",
            "products",
        ];
        if (in_array($name, $tables)) {
            $data = DB::select("SELECT * FROM " . $name);
        } else {
            $data = false;
        }
//        return view('dbtable', ["data" => $data]);
        return $data;
    }
}
