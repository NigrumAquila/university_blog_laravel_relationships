<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\GroupSubjectsService;
use App\Models\GroupSubject;
use App\Models\ExamMark;
use App\Models\Mark;

class GroupSubjectsController extends Controller
{
    public function index()
    {
        return view('group_subjects.index', GroupSubjectsService::indexData());
    }

    public function show($id)
    {
        return view('group_subjects.show', with(['group_subjects' => GroupSubject::findOrFail($id)]));
    }

    public function edit($id)
    {
        $group_subjects = GroupSubject::findOrFail($id);
        $marks = Mark::slice(Mark::all(), $group_subjects->exam_test);
        return view('group_subjects.edit', ['marks' => $marks, 'group_subjects' => $group_subjects]);
    }

    public function update(Request $request, $id)
    {
        $range = ExamMark::determineRange($request->exam_test);
        $this->validate($request, [
            'mark_id'  =>  "integer|between:$range",
            'date' => 'date',
            'exam_test' => 'string|in:экзамен,зачет'
        ]);

        $mark = ExamMark::find($id);
        $mark->edit($request->all());
        return redirect()->back();
    }
}
