<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Update Parcel
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center flex">
            <div class="bg-white dark:bg-gray-800 mt-4 overflow-hidden shadow-sm sm:rounded-lg w-[100%]">
                <form action="{{ route('new-parcel.update', $newParcel->id) }}" method="POST"
                    class=" bg-white p-8 shadow-lg rounded-xl w-[100%]">
                    @csrf
                    @method('PATCH')

                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Shipment</h2>

                    <fieldset class="mb-6 border border-gray-300 rounded-lg" x-data="{ open: false }">
                        <legend class="px-4 py-2 cursor-pointer font-semibold text-gray-800" @click="open = !open">
                            Shipment Details
                            <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm text-gray-500"></span>
                        </legend>

                        <div x-show="open" x-transition class="p-8">
                            {{-- Sender Name --}}
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Receiver Name</label>
                                    <input type="text" value="{{ $newParcel->sender_name }}" name="sender_name"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                {{-- Sender email --}}
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Sender email</label>
                                    <input type="email" value="{{ $newParcel->sender_email }}" name="sender_email"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Sender Phone</label>
                                    <input type="tel" value="{{ $newParcel->sender_phone }}" name="sender_phone"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            {{-- Recipient Details --}}
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Recipient Details</label>
                                <textarea name="recipient_details" cols="30" rows="4"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 mb-4">{{ $newParcel->recipient_details }}</textarea>
                            </div>

                            {{-- Recipient Address & Booking No --}}
                            <div class="grid grid-cols-4 gap-4 mb-4">
                                <div>
                                    @php
                                        $countries = [
                                            'Afghanistan',
                                            'Albania',
                                            'Algeria',
                                            'Andorra',
                                            'Angola',
                                            'Antigua and Barbuda',
                                            'Argentina',
                                            'Armenia',
                                            'Australia',
                                            'Austria',
                                            'Azerbaijan',
                                            'Bahamas',
                                            'Bahrain',
                                            'Bangladesh',
                                            'Barbados',
                                            'Belarus',
                                            'Belgium',
                                            'Belize',
                                            'Benin',
                                            'Bhutan',
                                            'Bolivia',
                                            'Bosnia and Herzegovina',
                                            'Botswana',
                                            'Brazil',
                                            'Brunei',
                                            'Bulgaria',
                                            'Burkina Faso',
                                            'Burundi',
                                            'Cabo Verde',
                                            'Cambodia',
                                            'Cameroon',
                                            'Canada',
                                            'Central African Republic',
                                            'Chad',
                                            'Chile',
                                            'China',
                                            'Colombia',
                                            'Comoros',
                                            'Congo (Congo-Brazzaville)',
                                            'Costa Rica',
                                            'Croatia',
                                            'Cuba',
                                            'Cyprus',
                                            'Czechia (Czech Republic)',
                                            'Democratic Republic of the Congo',
                                            'Denmark',
                                            'Djibouti',
                                            'Dominica',
                                            'Dominican Republic',
                                            'Ecuador',
                                            'Egypt',
                                            'El Salvador',
                                            'Equatorial Guinea',
                                            'Eritrea',
                                            'Estonia',
                                            'Eswatini',
                                            'Ethiopia',
                                            'Fiji',
                                            'Finland',
                                            'France',
                                            'Gabon',
                                            'Gambia',
                                            'Georgia',
                                            'Germany',
                                            'Ghana',
                                            'Greece',
                                            'Grenada',
                                            'Guatemala',
                                            'Guinea',
                                            'Guinea-Bissau',
                                            'Guyana',
                                            'Haiti',
                                            'Holy See',
                                            'Honduras',
                                            'Hungary',
                                            'Iceland',
                                            'India',
                                            'Indonesia',
                                            'Iran',
                                            'Iraq',
                                            'Ireland',
                                            'Israel',
                                            'Italy',
                                            'Jamaica',
                                            'Japan',
                                            'Jordan',
                                            'Kazakhstan',
                                            'Kenya',
                                            'Kiribati',
                                            'Kuwait',
                                            'Kyrgyzstan',
                                            'Laos',
                                            'Latvia',
                                            'Lebanon',
                                            'Lesotho',
                                            'Liberia',
                                            'Libya',
                                            'Liechtenstein',
                                            'Lithuania',
                                            'Luxembourg',
                                            'Madagascar',
                                            'Malawi',
                                            'Malaysia',
                                            'Maldives',
                                            'Mali',
                                            'Malta',
                                            'Marshall Islands',
                                            'Mauritania',
                                            'Mauritius',
                                            'Mexico',
                                            'Micronesia',
                                            'Moldova',
                                            'Monaco',
                                            'Mongolia',
                                            'Montenegro',
                                            'Morocco',
                                            'Mozambique',
                                            'Myanmar',
                                            'Namibia',
                                            'Nauru',
                                            'Nepal',
                                            'Netherlands',
                                            'New Zealand',
                                            'Nicaragua',
                                            'Niger',
                                            'Nigeria',
                                            'North Korea',
                                            'North Macedonia',
                                            'Norway',
                                            'Oman',
                                            'Pakistan',
                                            'Palau',
                                            'Palestine State',
                                            'Panama',
                                            'Papua New Guinea',
                                            'Paraguay',
                                            'Peru',
                                            'Philippines',
                                            'Poland',
                                            'Portugal',
                                            'Qatar',
                                            'Romania',
                                            'Russia',
                                            'Rwanda',
                                            'Saint Kitts and Nevis',
                                            'Saint Lucia',
                                            'Saint Vincent and the Grenadines',
                                            'Samoa',
                                            'San Marino',
                                            'Sao Tome and Principe',
                                            'Saudi Arabia',
                                            'Senegal',
                                            'Serbia',
                                            'Seychelles',
                                            'Sierra Leone',
                                            'Singapore',
                                            'Slovakia',
                                            'Slovenia',
                                            'Solomon Islands',
                                            'Somalia',
                                            'South Africa',
                                            'South Korea',
                                            'South Sudan',
                                            'Spain',
                                            'Sri Lanka',
                                            'Sudan',
                                            'Suriname',
                                            'Sweden',
                                            'Switzerland',
                                            'Syria',
                                            'Tajikistan',
                                            'Tanzania',
                                            'Thailand',
                                            'Timor-Leste',
                                            'Togo',
                                            'Tonga',
                                            'Trinidad and Tobago',
                                            'Tunisia',
                                            'Turkey',
                                            'Turkmenistan',
                                            'Tuvalu',
                                            'Uganda',
                                            'Ukraine',
                                            'United Arab Emirates',
                                            'United Kingdom',
                                            'United States',
                                            'Uruguay',
                                            'Uzbekistan',
                                            'Vanuatu',
                                            'Venezuela',
                                            'Vietnam',
                                            'Yemen',
                                            'Zambia',
                                            'Zimbabwe',
                                        ];
                                    @endphp

                                    <input list="countryList" name="recipient_address"
                                        value="{{ $newParcel->recipient_address }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                    <datalist id="countryList">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}"></option>
                                        @endforeach
                                    </datalist>

                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Reference Number</label>
                                    <input type="text" name="reference_no" value="{{ $newParcel->reference_no }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Booking Number</label>
                                    <input type="text" value="{{ $newParcel->booking_no }}" name="booking_no"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                {{-- Shipping Received Date --}}
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Shipping Received Date</label>
                                    <input type="date" value="{{ $newParcel->shipping_received_date }}"
                                        name="shipping_received_date"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 mb-4">
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <fieldset class="mb-6 border border-gray-300 rounded-lg"
                        x-data="{ open: {{ empty($newParcel->tracking_no) ? 'true' : 'false' }} }">
                        <legend class="px-4 py-2 cursor-pointer font-semibold text-gray-800" @click="open = !open">
                            Tracking Details
                            <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm text-gray-500"></span>
                        </legend>
                        <div x-show="open" x-transition class="p-8">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                {{-- Tracking Number --}}
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Tracking Number</label>
                                    <input type="text" value="{{ $newParcel->tracking_no }}" name="tracking_no"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                {{-- Tracking Site --}}
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Tracking Site</label>
                                    <input type="text" value="{{ $newParcel->tracking_site }}" name="tracking_site"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                            </div>
                            {{-- Tracking URL --}}
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Tracking URL</label>
                                <input type="url" value="{{ $newParcel->tracking_url }}" name="tracking_url"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mb-6 border border-gray-300 rounded-lg"
                        x-data="{ open: {{ empty($newParcel->in_transit_date) ? 'true' : 'false' }} }">
                        <legend class="px-4 py-2 cursor-pointer font-semibold text-gray-800" @click="open = !open">
                            Transit Details
                            <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm text-gray-500"></span>
                        </legend>

                        <div x-show="open" x-transition class="p-8">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                {{-- In Transit Date --}}
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">In Transit Date</label>
                                    <input type="date" value="{{ $newParcel->in_transit_date }}" name="in_transit_date"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                {{-- Transit City --}}
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1">Transit City</label>
                                    <input list="cityList" value="{{ $newParcel->transit_city }}" name="transit_city"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <datalist id="cityList">
                                        <option value="Frankfurt">
                                        <option value="Dubai">
                                        <option value="London">
                                        <option value="Toronto">
                                        <option value="New York">
                                        <option value="Hong Kong">
                                        <option value="Singapore">
                                        <option value="Amsterdam">
                                        <option value="Tokya">
                                        <option value="Seoul">
                                        <option value="Sydney">
                                        <option value="Melbourne">
                                        <option value="Auckland">
                                        <option value="Taipei">
                                        <option value="Beijing">
                                        <option value="Delhi">
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    {{-- Delivery Status --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-1">Delivery Date</label>
                        <input type="date" name="delivery_date" value="{{ $newParcel->delivery_date }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>