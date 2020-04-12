<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\LecturersService;
use App\Models\Lecturer;
use App\Models\Post;

class LecturersController extends Controller
{
    public function index()
    {
        return view('lecturers.index', LecturersService::indexData());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'surname'  =>  'required|string',
            'name'  =>  'required|string',
            'patronymic'  =>  'required|string',
            'post_id'  =>  'required|integer',
            'faculty_id' => 'required|integer'
        ]);
        $lecturer = Lecturer::add($request->all());

        return redirect()->route('faculties.show', $request->faculty_id);
    }

    public function show($id)
    {
        return view('lecturers.show', with(['lecturer' => Lecturer::findOrFail($id)]));
    }

    public function edit($id)
    {
        return view('lecturers.edit', with(['lecturer' => Lecturer::findOrFail($id), 'posts' => Post::orderBy('name')->get()]));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'surname'  =>  'string',
            'name'  =>  'string',
            'patronymic'  =>  'string',
            'post_id'  =>  'integer',
        ]);

        $lecturer = Lecturer::find($id);
        $lecturer->edit($request->all());
        return redirect()->route('lecturers.index');
    }

    public function destroy(Request $request, $id)
    {
        Lecturer::find($id)->delete();
        return redirect()->route('lecturers.index');
    }

}
