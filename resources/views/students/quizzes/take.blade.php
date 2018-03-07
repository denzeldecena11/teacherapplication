@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <h6>Take {{ $quiz->title }} Quiz</h6>
        <br/>
        <br/>
        <form action="{{ route('students.quizzes.answer', ['quiz_id' => $quiz->id]) }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="student_quiz_id" value="{{ $studentQuiz->id }}">
            <input type="hidden" name="quiz_item_id" value="{{ $currentQuizItem->id }}">
            <p>{{ $currentQuizItem->question }}</p>
            <br />
            <ul >
                @foreach($currentQuizItem->options as $index => $option)
                    <li>
                        <input type="radio" name="quiz_option_id" value="{{ $option->id }}"> {{ $option->content}}
                    </li>
                @endforeach
            </ul>
            <br/>
            <button type='submit' class="btn btn-primary btn-sm"><i class='fa fa-save'></i> Save Answer</button>
        </form>
    </div>
    <!-- /page content -->
@endsection