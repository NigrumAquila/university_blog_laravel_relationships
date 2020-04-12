<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\GroupSubject;

class GroupSubjectsService
{

    public static function indexData()
    {
        $data = array(
            'group_subjects' => GroupSubject::join('groups', 'groups.id', '=', 'group_subjects.group_id')
                ->join('subjects', 'subjects.id', '=', 'group_subjects.subject_id')
                ->join('lecturers', 'lecturers.id', '=', 'group_subjects.lecturer_id')
                ->select('group_subjects.id', 'group_subjects.exam_test', 'groups.name as group_name', 'subjects.name as subject_name', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic')
                ->where('groups.name','LIKE','%'.Input::get('group').'%')
                ->where('subjects.name','LIKE','%'.Input::get('subject').'%')
                ->where('lecturers.surname','LIKE','%'.Input::get('surname').'%')
                ->where('lecturers.name','LIKE','%'.Input::get('name').'%')
                ->where('lecturers.patronymic','LIKE','%'.Input::get('patronymic').'%')
                ->where('group_subjects.exam_test','LIKE','%'.Input::get('exam_test').'%')
                ->orderBy('lecturers.surname', 'ASC')->get(),
        );

        return $data;
    }
}
