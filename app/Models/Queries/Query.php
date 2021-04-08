<?php

namespace App\Models\Queries;
use Illuminate\Support\Facades\DB;

class Query
{
    protected $sql = "";

    public function get()
    {
        return DB::select($this->sql);
    }
}
