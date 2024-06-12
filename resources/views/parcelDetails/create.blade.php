<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Add parcel details here
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center flex">
            <div class="bg-white dark:bg-gray-800 mt-4 overflow-hidden shadow-sm sm:rounded-lg w-fit">
                <form class="max-w-sm mx-auto p-8" method="POST" action="/parcelDetails">
                    @csrf
                    <div class="mb-5">
                        <label for="pracel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Parcel Tracking Number</label>
                        <select id="" name="parcel_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            @foreach ($parcels as $parcel)
                                <option value="{{ $parcel->id }}">
                                    {{ $parcel->number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parcel
                            location</label>
                        <input type="location" name="location"
                            class="shadow-sm w-80  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="Date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Date</label>
                        <input type="date" name="date"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="Remarks"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks
                        </label>
                        <textarea id="message" rows="4" name="remarks"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave a comment..."></textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
