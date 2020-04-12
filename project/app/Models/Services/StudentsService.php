<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Student;

class StudentsService
{
    public static function indexData()
    {
        $data = array(
            'students' => Student::join('groups', 'groups.id', '=', 'students.group_id')
                ->select('students.id', 'groups.name as group_name', 'students.number', 'students.surname', 'students.name', 'students.patronymic', 'students.gender', 'students.birthday')
                ->where('groups.name', 'LIKE','%'.Input::get('group').'%')
                ->where('students.number', 'LIKE','%'.Input::get('number').'%')
                ->where('students.surname','LIKE','%'.Input::get('surname').'%')
                ->where('students.name','LIKE','%'.Input::get('name').'%')
                ->where('students.patronymic','LIKE','%'.Input::get('patronymic').'%')
                ->where('students.gender','LIKE','%'.Input::get('gender').'%')
                ->where('students.birthday','LIKE','%'.Input::get('birthday').'%')
                ->orderBy('groups.name', 'ASC')->get(),
        );

        return $data;
    }
}
