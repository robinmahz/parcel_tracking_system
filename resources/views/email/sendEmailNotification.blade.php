<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Notification</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .header {
            background-color: #2d3748;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 40px;
            color: #4a5568;
            line-height: 1.6;
        }

        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .message-text {
            margin-bottom: 30px;
            font-size: 16px;
        }

        .tracking-box {
            background-color: #edf2f7;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .tracking-label {
            font-size: 14px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .tracking-number {
            font-size: 24px;
            color: #2d3748;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: monospace;
        }

        .btn-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: #3182ce;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2c5282;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .details-table td {
            padding: 12px 0;
            border-bottom: 1px solid #edf2f7;
        }

        .details-table td:first-child {
            font-weight: 600;
            color: #718096;
            width: 40%;
        }

        .details-table td:last-child {
            text-align: right;
            color: #2d3748;
            font-weight: 500;
        }

        .footer {
            background-color: #f7fafc;
            padding: 20px 40px;
            text-align: center;
            font-size: 14px;
            color: #a0aec0;
            border-top: 1px solid #edf2f7;
        }

        .footer p {
            margin: 5px 0;
        }

        /* Mobile adjustments */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                margin: 0;
                border-radius: 0;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ config('app.name') }}</h1>
        </div>

        <div class="content">
            <div class="greeting">Hello {{ $data['sender_name'] ?? 'Valued Customer' }},</div>

            <p class="message-text">
                Your parcel has been successfully registered and is ready for tracking. below are the details of your
                shipment.
            </p>

            <div class="tracking-box">
                <div class="tracking-label">Tracking Number</div>
                <div class="tracking-number">{{ $data['tracking_no'] }}</div>
            </div>

            <table class="details-table">
                <tr>
                    <td>Recipient Details</td>
                    <td>{{ $data['recipient_details'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Tracking Site</td>
                    <td>{{ $data['tracking_site'] ?? 'N/A' }}</td>
                </tr>
            </table>

            @if(!empty($data['tracking_url']))
                <div class="btn-container">
                    <a href="{{ $data['tracking_url'] }}" class="btn" target="_blank">Track Shipment</a>
                </div>
            @endif

            <p class="message-text" style="font-size: 14px; color: #718096; margin-top: 30px;">
                Alternatively, you can visit <a href="{{ $data['tracking_site'] ?? '#' }}" style="color: #3182ce;">our
                    tracking site</a> and enter your tracking number manually.
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>Direct Way Cargo</p>
        </div>
    </div>
</body>

</html>