@extends('layouts.main')
@section('title', 'Ведомость')
@section('content')
<h2>Ведомость</h2>
<h3>&nbsp;</h3>
<h3>Группа: {{ $group_subjects->group->name }}</h3>
<h3>Предмет: {{ $group_subjects->subject->name }}</h3>
<h3>Преподаватель: {{ $group_subjects->lecturer->surname }} {{ $group_subjects->lecturer->name }} {{ $group_subjects->lecturer->patronymic }}</h3>
<h3>Форма сдачи: {{ $group_subjects->exam_test }}</h3>
<hr>
@if(count($group_subjects->examMarks) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="7%" scope="col">Номер</th>
    <th width="15%" scope="col">Зачетная книжка </th>
    <th width="17%" scope="col">Фамилия</th>
    <th width="13%" scope="col">Имя</th>
    <th width="15%" scope="col">Отчество</th>
    <th width="15%" scope="col">Оценка</th>
    <th width="21%" scope="col">Дата</th>
  </tr>
  @foreach($group_subjects->examMarks as $exam_mark)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $exam_mark->student->number }}</td>
    <td>{{ $exam_mark->student->surname }}</td>
    <td>{{ $exam_mark->student->name }}</td>
    <td>{{ $exam_mark->student->patronymic }}</td>
    <td>{{ $exam_mark->mark->name }}</td>
    <td>{{ $exam_mark->date }}</td>
  </tr>
  @endforeach
</table>
@else
<h3>Оценок пока нет!</h3>
@endif
<p><a href="{{ route('group_subjects.index') }}">На программу обучения</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')