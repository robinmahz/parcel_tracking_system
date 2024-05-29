    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        S.N
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Parcel name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tracking number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parcels as $key => $parcel)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ++$key }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $parcel->name }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $parcel->number }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2">
                            <a href="/parcel/{{ $parcel->id }}">Show</a>
                            @if (Auth::check())
                                <span>| </span>
                                <a href="/parcel/{{ $parcel->id }}/edit">Edit</a>
                                <span>| </span>
                                <form action="/parcel/{{ $parcel->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Delete</button>
                                </form>
                            @endif
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
