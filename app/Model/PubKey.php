<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PubKey extends Model
{
    protected $primaryKey = 'p_id';
    protected $table = 'p_pubkey';
}
