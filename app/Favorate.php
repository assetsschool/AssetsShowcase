<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'favorates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'project_id', 'deleted',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }

}
