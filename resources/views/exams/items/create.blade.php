@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        @if($exam->isDraft())
            <h3>Collate questions for {{ $exam->title }} </h3>
            <small>You can mark the checkboxes to include in exam</small>
            <br/>
            <div class="clearfix"></div>
        @endif
        <div class="col-md-12">
            @if($exam->isDraft())
                <div class="col-md-6">
                    <form method="post" action="{{ route('exams.items.create', $exam->id) }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($collatedSubjectQuestions as $index => $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                        </td>
                                        <td>
                                            {{ $item->question }} 
                                            @if($item->quiz_item_type == 1)
                                                @foreach($item->options as $option)
                                                    <span class="label label-success">{{ $option->content }}</span>
                                                @endforeach
                                            @else
                                                <ol>
                                                    @foreach($item->options as $option)
                                                        <li>
                                                            @if($option->is_correct)
                                                                {{ $option->content }}  <span class="label label-success">Correct Answer</span>
                                                            @else
                                                                {{ $option->content }}
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">
                                            <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Quiz has no questions yet!</strong> You can add questions on the right side.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="ln_solid"></div>
                        @if($collatedSubjectQuestions->count() != 0)
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-success"><i class='fa fa-save'></i> Save Exam Items</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            @endif
            <div class="{{ ($exam->isPublished()) ? 'col-md-12' : 'col-md-6' }}">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                @if($exam->isDraft())
                                    Exam Items
                                @else
                                    Exam Items <small>Ready for student to take.</small>
                                @endif
                            </th>
                            <th>
                                @if($exam->isDraft() && 0 != $exam->items->count())
                                    <form method="POST" action="{{ route('activity.publish') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="activity_id" value="{{ $exam->id }}">
                                        <button id="publish-quiz" type="submit" class="btn btn-primary pull-right btn-sm"><i class='fa fa-save'></i> Publish Exam</button>
                                    </form>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($exam->items as $index => $item)
                            @if($item->quiz_item_type == \App\Models\QuizItem::MULTIPLE_CHOICE)
                                <tr>
                                    <td colspan="2">
                                        {{ $item->question }} 
                                        <ol>
                                            @foreach($item->options as $option)
                                                <li>
                                                    @if($option->is_correct)
                                                        {{ $option->content }}  <span class="label label-success">Correct Answer</span>
                                                    @else
                                                        {{ $option->content }}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ol>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="2">
                                        {{ $item->question }} 
                                        @if($item->quiz_item_type == 1)
                                            @foreach($item->options as $option)
                                                <span class="label label-success">{{ $option->content }}</span>
                                            @endforeach
                                        @else
                                            <ol>
                                                @foreach($item->options as $option)
                                                    <li>
                                                        @if($option->is_correct)
                                                            {{ $option->content }}  <span class="label label-success">Correct Answer</span>
                                                        @else
                                                            {{ $option->content }}
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="2">
                                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                        <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Quiz has no questions yet!</strong> You can add questions on the right side.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /page content -->
@endsection