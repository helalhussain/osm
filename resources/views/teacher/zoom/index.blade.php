
@extends('layouts.teacher.app')

@section('teacher_content')

<x-admin.page-title dashboard_title="Teacher" title="Zoom" page_name="All Zoom">
    <a href="{{ route('teacher.zoom.create') }}" class="btn btn-success" id="addBtn">Add Zoom</a>
</x-admin.page-title>

<x-admin.table title="Zoom" :headers="['No', 'title', 'Action']" />

@endsection


