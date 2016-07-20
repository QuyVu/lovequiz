@extends('layouts.app')

@section('content')
    @parent
    {{ Html::style('/css/profile.css') }}
@stop

@section('script')
    @parent
    {{ Html::script('/js/profile.js') }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size:20px"><b>List of all Questions</b></div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f5f5f5">
                                    <th class="col-md-1" style="text-align:center">id</th>
                                    <th class="col-md-9">Content of Question</th>
                                    <th class="col-md-2" style="text-align:center">used (times)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td style="text-align:center">{{$question->question_id}}</td>
                                        <td>{{$question->content}}</td>
                                        <td style="text-align:center">{{$question->used_number}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
