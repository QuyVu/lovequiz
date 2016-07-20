@extends('layouts.app')

@section('content')
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                @if (Auth::user()->state=='pending')
                <h1 id="homeHeading">Greate!!!</h1>
                <hr>
                <p><b>You already sent an invitation to your partner, please wait</b></p>
                @endif
            </div>
        </div>
    </header>
@endsection
