<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSubjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('group_subjects')->insert([
            [
                'group_id' => 1,
                'subject_id' => 7,
                'lecturer_id' => 6,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 1,
                'subject_id' => 1,
                'lecturer_id' => 5,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 1,
                'subject_id' => 4,
                'lecturer_id' => 12,
                'exam_test' => 'зачет'
            ],
            [
                'group_id' => 1,
                'subject_id' => 8,
                'lecturer_id' => 11,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 1,
                'subject_id' => 5,
                'lecturer_id' => 13,
                'exam_test' => 'зачет'
            ],
            [
                'group_id' => 2,
                'subject_id' => 3,
                'lecturer_id' => 4,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 2,
                'subject_id' => 2,
                'lecturer_id' => 3,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 2,
                'subject_id' => 6,
                'lecturer_id' => 9,
                'exam_test' => 'зачет'
            ],
            [
                'group_id' => 3,
                'subject_id' => 2,
                'lecturer_id' => 3,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 3,
                'subject_id' => 4,
                'lecturer_id' => 8,
                'exam_test' => 'зачет'
            ],
            [
                'group_id' => 3,
                'subject_id' => 6,
                'lecturer_id' => 9,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 4,
                'subject_id' => 1,
                'lecturer_id' => 5,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 4,
                'subject_id' => 4,
                'lecturer_id' => 8,
                'exam_test' => 'зачет'
            ],
            [
                'group_id' => 5,
                'subject_id' => 8,
                'lecturer_id' => 10,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 5,
                'subject_id' => 7,
                'lecturer_id' => 1,
                'exam_test' => 'зачет'
            ],
            [
                'group_id' => 6,
                'subject_id' => 7,
                'lecturer_id' => 1,
                'exam_test' => 'экзамен'
            ],
            [
                'group_id' => 6,
                'subject_id' => 4,
                'lecturer_id' => 12,
                'exam_test' => 'зачет'
            ]
        ]);
    }
}
