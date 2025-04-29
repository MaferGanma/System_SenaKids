<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Moonshineuser extends Authenticatable
{
    use HasFactory;

    protected $table = 'moonshine_users';

    protected $fillable = [
        'name',
        'email',
        'avatar',
    ];
}



// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;

// class Moonshineuser extends Authenticatable
// {
//     use HasFactory;

//     protected $table = 'moonshine_users';

//     protected $fillable = [
//         'name',
//         'email',
//         'avatar',
//     ];
    
// }
