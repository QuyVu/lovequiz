@extends('layouts.app')

@section('script')
    @parent
    {{ Html::script('/js/home.js') }}
@stop

@section('content')
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                @if (Auth::user()->state=='available')
                <h2 id="homeHeading">What do you want to know about your partner???</h2>
                <hr>
                <p><b>Let send to your partner an invitation. And together, your couple will answer some same questions. <br>
                Your answers may surprises both of you :)</b></p>
                {!! Form::open(array('action' => 'QuizController@invite', 'enctype' => 'multipart/form-data')) !!}
                    {!!Form::text('partner','',['class'=>'form-control', 'style'=>'vertical-align: middle;width:250px; height:45px; display:inline; font-size:18px', 'placeholder'=>'Enter Your Partner\'s Name'])!!}
                    {!!Form::submit('Start a Quizz',['class'=>'btn btn-outline btn-danger btn-lg']) !!}
                {!! Form::close() !!}
                @elseif (Auth::user()->state=='pending')
                    <h2><b>You already sent an invitation to your partner, please wait!</b></h2>
                @elseif (Auth::user()->state=='invited')
                    <h2><b>You have recieved an invitation. Do you want to join this game?</b></h2>
                    <button id='accept' class='btn btn-lg btn-outline btn-success'>Yes</button>
                    <button id='deny' class='btn btn-lg btn-outline btn-danger'>No</button>
                @endif
            </div>
        </div>
    </header>
@endsection
