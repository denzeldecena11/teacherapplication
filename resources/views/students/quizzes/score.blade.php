@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <h6>Your {{ $quiz->title }} Quiz Score</h6> 
        <br/>
        <br/>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentQuizAnswers as $index => $quizItem)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $quizItem->question }}</td>
                        <td>
                            @if( $quizItem->is_correct )
                                <span class="label label-success">
                                    <?php $score += 1; ?>
                                    {{ $quizItem->content }}
                                </span>
                            @else
                                <span class="label label-danger">
                                    {{ $quizItem->content }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        <span class='pull-right'><strong>Your Score:</strong></span>
                    </td>
                    <td>
                        <span>{{ round($score/$studentQuizAnswers->count() * 100) }}%</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /page content -->
@endsection