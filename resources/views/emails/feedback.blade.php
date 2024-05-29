<x-mail::message>
    # Customer Help and Support

    The contents of message are:

    Name: {{ $data['name'] }}
    Email: {{ $data['email'] }}
    Phone: {{ $data['phone'] }}
    Message: {{ $data['message'] }}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
