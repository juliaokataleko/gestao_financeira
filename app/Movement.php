<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model {

    protected $table = 'movements';
    // created_at OR updated_at
    # false se não tiver datas
    public $timestamps = true;

}