<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    const OFFSET = 'зачет';
    const EXAM = 'экзамен';
 
    public $timestamps = false;

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }

    public static function slice($marks, $test_form)
    {
        if($test_form == self::OFFSET) 
        {
            return $marks->except([3,4,5,6]);
        }
        elseif($test_form == self::EXAM)
        {
            return $marks->except([1,2]);
        }
    }
}
