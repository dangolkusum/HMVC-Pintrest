<?php

namespace App\Models\Modules\Pin\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;

    protected $table = 'pins';

    protected $guarded = [];

    public function user()
    {
        $this -> belongsTo(User::class);

    }
}
