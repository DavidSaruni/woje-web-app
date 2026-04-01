<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply from WOJE</title>
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
        .original-message {
            background-color: white;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #f53003;
            margin: 20px 0;
        }
        .admin-reply {
            background-color: #e8f5e8;
            padding: 20px;
            border-radius: 4px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }
        .field-label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>WOJE</h1>
        <h2>Response to Your Inquiry</h2>
    </div>

    <div class="content">
        <p>Dear {{ $contactMessage->full_name }},</p>
        
        <p>Thank you for contacting WOJE. We have received your message and our team has reviewed your inquiry. Please find our response below:</p>

        <div class="admin-reply">
            <h4 style="margin-top: 0; color: #28a745;">Our Response:</h4>
            <div>{{ nl2br(e($adminReply)) }}</div>
        </div>

        <div class="original-message">
            <h4 style="margin-top: 0; color: #f53003;">Your Original Message:</h4>
            <div><strong>Subject:</strong> {{ $contactMessage->subject }}</div>
            <div style="margin-top: 10px;">
                <strong>Message:</strong><br>
                {{ nl2br(e($contactMessage->message)) }}
            </div>
        </div>

        <p>If you have any further questions or need additional information, please don't hesitate to contact us.</p>

        <p>Best regards,<br>
        The WOJE Team</p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #dee2e6;">

        <div style="text-align: center;">
            <p><strong>WOJE - Women Organization for Joint Enterprises</strong></p>
            <p>Email: info@woje.org</p>
            <p>Website: www.woje.org</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; {{ now()->year }} WOJE - Women Organization for Joint Enterprises</p>
        <p>This is an automated response to your inquiry. Please do not reply to this email.</p>
    </div>
</body>
</html>
