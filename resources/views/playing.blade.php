@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" style="font-size:20px"><b>Please answer all of these questions.</b></div>
            <div class="panel-body">
                <div class="col-md-10 col-md-offset-1">
                    {!! Form::open(array('url' => 'quiz/submit')) !!}
                        @foreach ($questionsList as $question)
                            <div class="panel panel-default question-panel">
                                <p class="question-content" >{{ $question->content }}</p>
                                {!! Form::text($question->question_id,'',['class'=>'form-control', 'style'=>'border:0px']); !!}
                            </div>
                        @endforeach
                        <div class="buttonHolder">
                            {!! Form::submit('Kết thúc trả lời', ['class'=>'btn btn-primary']); !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection
