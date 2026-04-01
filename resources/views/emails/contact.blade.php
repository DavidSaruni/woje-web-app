<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message - WOJE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f53003;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border: 1px solid #dee2e6;
            border-top: none;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 8px 8px;
            font-size: 14px;
        }
        .field-label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
        }
        .field-value {
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
        }
        .message-content {
            background-color: white;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            min-height: 100px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>WOJE</h1>
        <h2>New Contact Message Received</h2>
    </div>

    <div class="content">
        <p>A new contact message has been submitted through the WOJE website. Here are the details:</p>

        <div class="field-label">Full Name:</div>
        <div class="field-value">{{ $contactData['first_name'] }} {{ $contactData['last_name'] }}</div>

        <div class="field-label">Email Address:</div>
        <div class="field-value">
            <a href="mailto:{{ $contactData['email'] }}">{{ $contactData['email'] }}</a>
        </div>

        <div class="field-label">Subject:</div>
        <div class="field-value">{{ $contactData['subject'] }}</div>

        <div class="field-label">Message:</div>
        <div class="message-content">
            {{ nl2br(e($contactData['message'])) }}
        </div>

        <p><strong>Submitted on:</strong> {{ now()->format('F d, Y \a\t g:i A') }}</p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #dee2e6;">

        <p><strong>Next Steps:</strong></p>
        <ul>
            <li>Log in to the admin panel to view and manage this message</li>
            <li>Reply to the sender using the admin reply feature</li>
            <li>Track the message status in the contact management system</li>
        </ul>
    </div>

    <div class="footer">
        <p>&copy; {{ now()->year }} WOJE - Women Organization for Joint Enterprises</p>
        <p>This is an automated notification from the WOJE website contact form.</p>
    </div>
</body>
</html>
