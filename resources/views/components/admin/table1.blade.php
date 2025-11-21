<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Booking No
                </th>
                <th scope="col" class="px-6 py-3">
                    Reference No
                </th>
                <th scope="col" class="px-6 py-3">
                    Senders name
                </th>
                <th scope="col" class="px-6 py-3">
                    Senders Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Recepient Details
                </th>
                <th scope="col" class="px-6 py-3">
                    Delivery Address
                </th>

                <th scope="col" class="px-6 py-3">
                    Received Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Tracking No
                </th>
                <th scope="col" class="px-6 py-3">
                    Transit City
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parcels as $key => $parcel)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->booking_no }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->reference_no }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->sender_name }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->sender_phone }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->recipient_details }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->recipient_address }}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->shipping_received_date }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->tracking_no }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $parcel->transit_city }}
                    </th>
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 ">
                        @if (Auth::check())
                            <a href="/new-parcel/{{ $parcel->id }}/edit">Edit</a>
                            <span>| </span>
                            <button onclick="openDeleteModal({{ $parcel->id }})"
                                class="px-4 py-1 bg-red-600 hover:bg-red-700 text-white rounded">
                                Delete
                            </button>
                        @endif
                    </th>
                </tr>
                <!-- Delete Modal -->
                <div id="deleteModal"
                    class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center z-50">
                    <div class="bg-white rounded-lg shadow-lg w-96 p-6">

                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Delete</h2>
                        <p class="text-gray-600 mb-6">Are you sure you want to delete this parcel? This action cannot be
                            undone.</p>

                        <!-- Action buttons -->
                        <div class="flex justify-end gap-3">
                            <button onclick="closeDeleteModal()"
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded">
                                Cancel
                            </button>
                            <form action="/new-parcel/{{ $parcel->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="px-4 py-2 rounded text-white  bg-red-600 hover:bg-red-700">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function openDeleteModal(id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
