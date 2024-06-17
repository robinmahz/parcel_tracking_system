@extends('app')

@section('content')
    <div class="pt-20 px-10 md:pt-28 md:px-40 md:pb-11 h-screen
    ">
        @if ($parcel)
            @include('components.admin.table2')
        @else
            <p>Sorry, No package with that number has been added!</p>
        @endif
    </div>
@endsection
