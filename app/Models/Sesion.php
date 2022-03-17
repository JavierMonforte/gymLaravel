<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sesion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'inicio',
        'fin',
        'activity_id'
    ];

    public function activity()
    { // el nombre es significativo
        return $this->belongsTo(Activity::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function addUser(User $user)
    {

        $this->users()->attach($user);
    }
 /*  public function fromDateTime($value)
    {
        return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');
    }*/
}
