<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectLine }}</title>
</head>
<body style="font-family: sans-serif; color: #1a202c; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="font-size: 20px; font-weight: bold; color: #111827; margin-bottom: 16px;">Hello {{ $applicant->full_name }},</h2>
    
    <div style="white-space: pre-wrap; font-size: 15px; margin-bottom: 24px; color: #374151;">
        {!! nl2br(e($bodyText)) !!}
    </div>

    <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 24px 0;">
    <p style="font-size: 12px; color: #6b7280; margin-bottom: 4px;">Sent via JobDock on behalf of <strong>{{ $applicant->job->user->name }}</strong>.</p>
    <p style="font-size: 11px; color: #9ca3af; margin-top: 0;">This email is in reference to your application for <strong>{{ $applicant->job->title }}</strong>.</p>
</body>
</html>
