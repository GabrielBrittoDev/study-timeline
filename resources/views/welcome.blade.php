@extends('layouts.app')

@section('content')
    <landing-page @if(Auth::check()) :username="'{!! Auth::user()->username !!}'" @endif>
    </landing-page>
@endsection
