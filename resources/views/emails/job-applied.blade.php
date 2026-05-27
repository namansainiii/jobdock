<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobDock Application</title>
</head>
<body>
    <p>
        A New Applicant Applied To Your Job ({{$job->title}}) 
    </p>
    <p><strong><u>Application Details</u></strong></p>
    <p><strong>Name: </strong>{{$application->full_name}}</p>
    @if($application->contact_phone)
        <p><strong>Phone: </strong>{{$application->contact_phone}}</p>
    @endif
    <p><strong>Email: </strong>{{$application->contact_email}}</p>
    @if($application->location)
        <p><strong>Location: </strong>{{$application->location}}</p>
    @endif
    @if($application->message)
        <p><strong>Message: </strong>{{$application->message}}</p>
    @endif
    <p>
        Login To JobDock Account To View The Application
    </p>
    
</body>
</html>