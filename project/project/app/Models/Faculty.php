<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'abbreviation',
    ];

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class)->orderBy('surname');
    }

    public static function add($fields)
    {
        $faculty = new static;
        $faculty->fill($fields);
        $faculty->save();

        return $faculty;
    }

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }
}
