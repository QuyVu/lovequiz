@extends('layouts.app')

@section('content')
@if (Auth::user()->state=='finished')
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
					</div>
				</div>
			</div>  
		</div>
	</div>
@elseif (Auth::user()->state=='waiting')
  <header>
      <div class="header-content">
          <div class="header-content-inner">
						<h2><b>Please wait while your Partner is doing the Quiz.</b></h2>
          </div>
      </div>
  </header>
@endif
@endsection