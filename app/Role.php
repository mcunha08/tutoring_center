<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Role extends Model
{
    protected $fillable = [
        'name'
    ];
    public function users(){
        $this->hasMany(User::class);
    }
}
