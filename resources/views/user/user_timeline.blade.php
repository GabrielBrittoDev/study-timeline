@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="">
                    <user_timeline :achievements='{!! json_encode($achievements) !!}'>

                    </user_timeline>

                </div>
            </div>
        </div>
    </div>
@endsection
