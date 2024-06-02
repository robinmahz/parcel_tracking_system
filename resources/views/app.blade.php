<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcel Tracking System</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body,
        html {
            font-family: Poppins, sans-serif !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans ">
    <!-- Header -->
    <header class="bg-blue-600 text-white py-4 w-[100%] z-10" style="position: fixed">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">ParcelTrack</h1>
            <nav>
                <a href="/" class="text-white hover:text-gray-200 ml-4">Home</a>
                <a href="#about" class="text-white hover:text-gray-200 ml-4">About</a>
                <a href="#track" class="text-white hover:text-gray-200 ml-4">Track Order</a>
                <a href="#contact" class="text-white hover:text-gray-200 ml-4">Contact</a>
            </nav>
        </div>
    </header>
    @yield('content')
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Direct way. All rights reserved. Designed by <a href="https://www.apptechnologies.co/"
                    target="_blank" rel="noopener noreferrer">App Technologies</a></p>
        </div>
    </footer>
</body>

</html>
