<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $table = 'items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'price','description','stock','itemUniqueId','status',
    ];

}
 