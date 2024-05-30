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
                <img class="w-full h-auto rounded-lg shadow-lg"
                    src="https://img.freepik.com/free-vector/delivery-man-with-boxes-car-gives-package-client-parcel-carton-courier-person-postman-transport-express_1284-41994.jpg?t=st=1716970035~exp=1716973635~hmac=b2a2141786701b1b452cded19186c0421c087619ac627c702d28610ed7b4b1ae&w=1380"
                    alt="Parcel Tracking">
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <main id="track" class="container mx-auto py-16 px-6 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Track Your Parcel</h2>
        <p class="text-gray-600 mb-8">Enter your tracking number below to get the current status of your shipment.</p>
        <form class="max-w-md mx-auto mb-12" action="/track" method="POST">
            @csrf
            <div class="flex items-center border-b border-blue-500 py-2">
                <input
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
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
                        <img class="rounded-lg shadow-lg mb-4"
                            src="https://img.freepik.com/free-vector/delivery-man-unload-delivery-car-boxes-transportation-cargo-cardboard-vehicle_1284-42006.jpg?t=st=1716970195~exp=1716973795~hmac=3009d12f70c9297d01e766eb91c650017e2ddf642950fcf36e16d0b446de2f5f&w=1480"
                            alt="Company Image 1">
                        <h4 class="text-xl font-bold mb-2">Our Mission</h4>
                        <p>We aim to provide the fastest and most reliable parcel tracking service in the industry,
                            ensuring your packages are always in good hands.</p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <img class="rounded-lg shadow-lg mb-4"
                            src="https://img.freepik.com/free-vector/taxi-app-interface-concept_23-2148496102.jpg?t=st=1716970513~exp=1716974113~hmac=9b2672e8d805f9e19c7c02410ebdea87db02b863ed19f4a182303a421d468d5b&w=1480"
                            alt="Company Image 2">
                        <h4 class="text-xl font-bold mb-2">Our Vision</h4>
                        <p>To be the leading global provider of logistics and parcel tracking solutions, connecting
                            people and businesses with seamless delivery experiences.</p>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <img class="rounded-lg shadow-lg mb-4"
                            src="https://img.freepik.com/free-vector/delivery-service-with-masks-concept_23-2148498421.jpg?t=st=1716970152~exp=1716973752~hmac=f5122ab384012bcec3efcc11f5381f2f23c4f475acdd324c4fc02db1fc705f08&w=1480"
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

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us
                </h2>
                <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical
                    issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.
                </p>
                <form action="/" method="POST" class="space-y-8">
                    @csrf
                    <div>
                        <label for="name"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300 text-left">Your
                            name</label>
                        <input type="text" id="name" name="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="Name" required>
                    </div>
                    <div>
                        <label for="email"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300 text-left">Your
                            email</label>
                        <input type="email" id="email" name="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="Email" required>
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300 text-left">Your
                            Phone</label>
                        <input type="phone" id="phone" name="phone"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="phone" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-400 text-left">Your
                            message</label>
                        <textarea id="message" rows="6" name="message"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Leave a comment..."></textarea>
                    </div>
                    <button type="submit"
                        class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-500 sm:w-fit hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 ">Send
                        message</button>
                </form>
            </div>
        </section>
    </main>
@endsection
