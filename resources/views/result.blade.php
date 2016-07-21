@extends('layouts.app')

@section('script')
    @parent
    {{ Html::script('/js/result.js') }}
@stop

@section('content')
@if (Auth::user()->state=='waiting')
  <header>
      <div class="header-content">
          <div class="header-content-inner">
						<h2><b>Please wait while your Partner is doing the Quiz.</b></h2>
          </div>
      </div>
  </header>
@else ()
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-size:20px"><b>Your Partner's Answers</b></div>
				<div class="panel-body">
					<div class="col-md-10 col-md-offset-1">
						@foreach ($data as $question => $answer)
						<div class="panel panel-default question-panel">
							<p class="question-content">{{$question}}</p>
							<p class="answer-content">{{$answer}}</p>
						</div>
						@endforeach
          	<button id='go-home' class='btn btn-lg btn-outline btn-success buttonHolder'>Go to Homepage</button>
            <button id='create-new' class='btn btn-lg btn-outline btn-danger buttonHolder' 
            	@if (Auth::user()->state!='available' && Auth::user()->state!='finished') 
            		disabled 
            	@endif>Create New Quiz</button>
					</div>
				</div>
			</div>  
		</div>
	</div>
@endif
@endsection