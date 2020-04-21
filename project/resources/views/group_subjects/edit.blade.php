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
@include('sections.show_errors')
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
    <td>
      <form action="{{ route('group_subjects.update', $exam_mark->id) }}" method="POST" autocomplete="off">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <p>
        <select name="mark_id">
          @foreach($marks as $mark)
          <option value="{{ $mark->id }}" @if($exam_mark->mark_id == $mark->id) selected @endif>{{ $mark->name }}</option>
          @endforeach
        </select>
        <p>
          <input type="hidden" name="exam_test" value="{{ $group_subjects->exam_test }}">
          <input type="submit" id="Submit" name="Submit" value="!">
        </p>
      </form>
    </td>
    <td>
      <form action="{{ route('group_subjects.update', $exam_mark->id) }}" method="post" autocomplete="off">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <p>
          <input name="date" type="text" id="border-bottom" value="{{ $exam_mark->date }}">
        </p>
        <p>
          <input type="submit" name="Submit" value="!" id="Submit">
        </p>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@else
<h3>Оценок пока нет!</h3>
@endif
<p><a href="{{ route('group_subjects.index') }}">На программу обучения</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')