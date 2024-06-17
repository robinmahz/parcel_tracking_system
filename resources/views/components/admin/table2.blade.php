<div class="relative overflow-x-auto">
    <h1>Tracking Details for Parcel no: <strong>{{ $parcel->number }} ({{ $parcel->name }})</strong></h1>
   <br>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    S.N
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Remarks
                </th>
                @if (Auth::check())
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($parcel->parcelDetails as $key => $parcelDetail)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ ++$key }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcelDetail->date }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcelDetail->location }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {!! $parcelDetail->remarks !!}
                    </th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
