<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRandomizer extends Model
{
    use HasFactory;

    // protected $table = 'email_table';

    protected $cast = ["emails"];

    protected $table = "email_randomizers";




}
