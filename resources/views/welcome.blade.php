@extends('app')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="bg-white py-16">
        <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center mt-16">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-5xl font-bold text-gray-800 mb-6">Fast & Reliable Parcel Tracking</h2>
                <p class="text-gray-600 text-lg">Track your shipments easily and get real-time updates on your parcels.
                    <br>
                    We ensure your packages are always in safe hands.
                </p>
            </div>
            <div class="lg:w-1/2">
                <img class="w-full h-auto rounded-lg shadow-lg" src="{{ asset('images/banner.jpg') }}" alt="Parcel Tracking">
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <main id="track" class="container mx-auto py-16 px-6 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Track Your Parcel</h2>
        <p class="text-gray-600 mb-8">Enter your tracking number below to get the current status of your shipment.</p>
        <form class="max-w-md mx-auto mb-12" action="/track" method="POST">
            @csrf
            <div class="flex items-center  py-2">
                <input
                    class="appearance-none bg-transparent  w-full border-b border-blue-500 text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none rounded"
                    type="text" placeholder="First Name" aria-label="First Name" name="name">
                <input
                    class="appearance-none bg-transparent  w-full border-b border-blue-500 text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none rounded"
                    type="text" placeholder="Tracking Number" aria-label="Tracking Number" name="number">
                <button id="about" class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded"
                    type="submit">
                    Track
                </button>
            </div>
        </form>

        <!-- About Us Section -->
        <section class="text-gray-700">
            <div class="container mx-auto px-6 py-12">
                <h3 class="text-3xl font-bold text-gray-800 mb-6">About Us</h3>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <img class="rounded-lg shadow-lg mb-4 h-[15rem] mx-auto" src="{{ asset('images/mission.jpg') }}"
                            alt="Company Image 1">
                        <h4 class="text-xl font-bold mb-2">Our Mission</h4>
                        <p>We aim to provide the fastest and most reliable parcel tracking service in the industry,
                            ensuring your packages are always in good hands.</p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <img class="rounded-lg shadow-lg mb-4 h-[15rem] mx-auto" src="{{ asset('images/vision.jpg') }}"
                            alt="Company Image 2">
                        <h4 class="text-xl font-bold mb-2">Our Vision</h4>
                        <p>To be the leading global provider of logistics and parcel tracking solutions, connecting
                            people and businesses with seamless delivery experiences.</p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <img class="rounded-lg shadow-lg mb-4 h-[15rem] mx-auto" src="{{ asset('images/value.jpg') }}"
                            alt="Company Image 3">
                        <h4 class="text-xl font-bold mb-2">Our Values</h4>
                        <p id="contact">We believe in transparency, efficiency, and customer satisfaction. Our team is
                            dedicated to
                            making sure your parcels arrive safely and on time.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="bg-white dark:bg-gray-900 px-16">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-xl">
                <h2 class="mb-8 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us
                </h2>
                <p class="mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">
                    Got a technical issue? Need details about our Business plan?
                    Let us know.
                </p>
                <div class="flex flex-col lg:flex-row items-start lg:space-x-8 gap-8">
                    <!-- Contact Details Section -->
                    <div class="bg-gray-100 dark:bg-gray-800 px-8 pt-16 rounded-lg shadow-md w-full lg:w-1/2 lg:mb-0">
                        <h3 class="font-bold mb-8 text-3xl text-left">Contact Details</h3>
                        <ul class="text-gray-700 dark:text-gray-300 text-left h-[24rem]">
                            <li class="mb-8">
                                <strong>Address:</strong> Thamel Marg, Kathmandu, Nepal
                            </li>
                            <li class="mb-8">
                                <strong>Phone:</strong> +977-1-5350337 / +977-1-5316559
                            </li>
                            <li class="mb-2">
                                <strong>Email:</strong> directwy@gmail.com
                            </li>
                            <div class="flex gap-6 pl-4">
                                <a href="https://facebook.com/Directway" target="blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="100"
                                        viewBox="0 0 48 48">
                                        <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                        <path fill="#fff"
                                            d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/DIRECTWAY" target="blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="100"
                                        viewBox="0 0 48 48">
                                        <path fill="#03A9F4"
                                            d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            {{-- <li>
                                <strong>Twitter:</strong> <a href="https://twitter.com/DIRECTWAY"
                                    class="text-blue-500">DIRECTWAY</a>
                            </li>
                            <li>
                                <strong>Facebook:</strong> <a href="https://facebook.com/Directway"
                                    class="text-blue-500">Directway</a>
                            </li> --}}
                        </ul>
                    </div>
                    <!-- Contact Form Section -->
                    <div class="w-full lg:w-1/2 text-left">
                        <form action="/" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="name"
                                    class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300">Your
                                    Name</label>
                                <input type="text" id="name" name="name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Name" required>
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300">Your
                                    Email</label>
                                <input type="email" id="email" name="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Email" required>
                            </div>
                            <div>
                                <label for="phone"
                                    class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300">Your
                                    Phone</label>
                                <input type="phone" id="phone" name="phone"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Phone" required>
                            </div>
                            <div>
                                <label for="message"
                                    class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300">Your
                                    Message</label>
                                <textarea id="message" rows="6" name="message"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Leave a comment..."></textarea>
                            </div>
                            <button type="submit"
                                class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-500 sm:w-fit hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">Send
                                Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
