@extends('app')

@section('content')
    <div class="pt-20 px-10 md:pt-28 md:px-40 md:pb-11 h-screen
    ">
        @if ($parcel)
            <h1>Tracking Details for Parcel no: <strong>{{ $parcel->booking_no }} ({{ $parcel->sender_name }})</strong>
                @if ($parcel->reference_no)
                    - Reference No: <strong>{{ $parcel->reference_no }}</strong>
                @endif
            </h1>
            <br>
            <div class="max-w-4xl mb-8  py-6">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Shipment Timeline</h2>

                <div class="relative border-l-2 border-gray-200 dark:border-gray-700 ml-4">
                    {{-- Delivered --}}
                    @if ($parcel->delivery_date)
                        <div class="mb-10 ml-6 relative">
                            <div
                                class="absolute -left-5 w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-white font-bold shadow">
                                ✅
                            </div>
                            <div class="pl-6">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                                    {{ $parcel->delivery_date }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mt-1">
                                    Shipment Delivered
                                </h3>
                                <p class="text-gray-700 dark:text-gray-200 mt-1">
                                    Delivered to Receiver at {{ $parcel->recipient_address }}
                                </p>
                            </div>
                        </div>
                    @endif


                    {{-- In Transit --}}
                    @if ($parcel->in_transit_date)
                        <div class="mb-10 ml-6 relative">
                            <div
                                class="absolute -left-5 w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-bold shadow">
                                🚚
                            </div>
                            <div class="pl-6">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                                    {{ $parcel->in_transit_date }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mt-1">
                                    Shipment In Transit
                                </h3>
                                <p class="text-gray-700 dark:text-gray-200 mt-1">
                                    Currently in {{ $parcel->transit_city }}
                                </p>
                            </div>
                            <div class="pl-6">
                                <fieldset class="mt-4 p-2 border border-gray-300 rounded">
                                    <legend>Tracking Details</legend>
                                    <div class="grid grid-cols-2 gap-4">
                                        <span class="text-gray-700 dark:text-gray-200 mt-1">
                                            Forwarded under tracking No: <strong> {{ $parcel->tracking_no }}</strong>
                                        </span>
                                        <span class="text-gray-700 dark:text-gray-200 mt-1">
                                            Tracking Site: <strong>{{ $parcel->tracking_site }}</strong>
                                        </span>
                                    </div>
                                    <span class="text-gray-700 dark:text-gray-200 mt-1">
                                        Tracking Url: <a href="{{ $parcel->tracking_url }}" class="font-bold text-blue-600"
                                            target="_blank">{{ $parcel->tracking_url }}</a>
                                    </span>
                                </fieldset>
                            </div>
                        </div>
                    @endif

                    {{-- Shipping Received --}}
                    @if ($parcel->shipping_received_date)
                        <div class="mb-10 ml-6 relative">
                            <div
                                class="absolute -left-5 w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow">
                                📦
                            </div>
                            <div class="pl-6">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                                    {{ $parcel->shipping_received_date }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mt-1">
                                    Shipment Received & Dispatched to destination
                                </h3>
                                <p class="text-gray-700 dark:text-gray-200 mt-1">
                                    Sent to {{ $parcel->recipient_address }} from Kathmandu, Nepal
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        @else
            <p>Sorry, No package with that name and number was found!</p>
        @endif
    </div>
@endsection
