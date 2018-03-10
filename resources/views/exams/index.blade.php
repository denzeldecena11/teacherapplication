@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <a  class="btn btn-primary btn-sm" href="{{ route('exams.create') }}"><i class='fa fa-plus'></i> Create Exam</a>
    	<table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exams as $index => $exam)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td><a href="{{ route('exams.items.create', $exam->id) }}">{{ $exam->title }}</a></td>
                        <td>{{ $exam->subject->name }}</td>
                        <td>
                            <a href="#"><i class='fa fa-edit'></i></a> | 
                            <a href="#"><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-info alert-dismissible fade in" role="alert">
                                <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>No Quiz Found!</strong> You can create quiz by clicking "Create Quiz" button above.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /page content -->
@endsection