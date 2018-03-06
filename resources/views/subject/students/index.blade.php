@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class='col-md-12'>
            <h4 class='pull-left'> {{ $subject->name }}</h4>
            
            <a  class="btn btn-primary btn-sm pull-right" href="{{ route('subject.students.attendance.index', ['subject_id' => $subject_id]) }}">
                <i class='fa fa-plus'></i> View Attendance
            </a>
            <a  class="btn btn-success btn-sm pull-right" href="{{ route('subject.students.attendance.create', ['subject_id' => $subject_id]) }}">
                <i class='fa fa-plus'></i> Create Attendance
            </a>
        </div>
        <div class="clearfix"></div>
        <br/>
    	<table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjectStudents as $index => $subjectStudent)
                    <tr>
                        <td scope="row">{{ $index + 1 }}</td>
                        <td>{{ $subjectStudent->student->name }}</td>
                        <td>{{ $subjectStudent->student->email }}</td>
                        <td>
                            <a href="#"><i class='fa fa-edit'></i></a> | 
                            <a href="#"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /page content -->
@endsection