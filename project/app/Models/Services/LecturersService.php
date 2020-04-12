<?php 
namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Lecturer;

class LecturersService
{
    public static function indexData()
    {
        $data = array(
            'lecturers' => Lecturer::join('posts', 'posts.id', '=', 'lecturers.post_id')
                ->join('faculties', 'faculties.id', '=', 'lecturers.faculty_id')
                ->select('lecturers.id', 'lecturers.surname', 'lecturers.name', 'lecturers.patronymic', 'posts.name as post_name', 'faculties.abbreviation')
                ->whereColumn('posts.id', 'lecturers.post_id')
                ->where('lecturers.surname','LIKE','%'.Input::get('surname').'%')
                ->where('lecturers.name','LIKE','%'.Input::get('name').'%')
                ->where('lecturers.patronymic','LIKE','%'.Input::get('patronymic').'%')
                ->where('posts.name','LIKE','%'.Input::get('post').'%')
                ->where('faculties.name','LIKE','%'.Input::get('faculty').'%')
                ->orderBy('lecturers.surname', 'ASC')->get(),
        );

        return $data;
    }
}
