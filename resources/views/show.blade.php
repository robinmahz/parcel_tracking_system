@extends('app')

@section('content')
    <div class="pt-20 px-10 md:pt-28 md:px-40 md:pb-11 h-screen
    ">
        @if ($parcel)
            <h1>Tracking Details for Parcel no: <strong>{{ $parcel->number }} ({{ $parcel->name }})</strong></h1>
            <br>
            <ol>
                @foreach ($parcel->parcelDetails as $key => $parcelDetail)
                    <li class="list-disc pl-10">
                        <p>Date: {{ $parcelDetail->date }}</p>
                        <p><strong>{!! $parcelDetail->remarks !!}</strong></p>
                        <p>Location: {{ $parcelDetail->location }}</p>
                        <p>Parcel No: {{ $parcel->number }}</p>
                        @if (Auth::check())
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2">
                                <a href="/parcelDetails/{{ $parcelDetail->id }}/edit">Edit</a>
                                <span>| </span>
                                <form action="/parcelDetails/{{ $parcelDetail->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Delete</button>
                                </form>
                            </th>
                        @endif
                    </li>
                    <hr class="my-5">
                @endforeach
            </ol>
        @else
            <p>Sorry, No package with that name and number was found!</p>
        @endif
    </div>
@endsection
