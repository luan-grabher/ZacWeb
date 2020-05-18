@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @php $card = ['route'=>'Notices']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'Robots']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'Tasks']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'birthday_messages']; @endphp
            @include('layouts.home-card-link')

            @php $card = ['route'=>'overtime_calendar']; @endphp
            @include('layouts.home-card-link')
        </div>
    </div>
@endsection
