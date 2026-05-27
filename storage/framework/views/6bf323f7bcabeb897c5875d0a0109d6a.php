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
        A New Applicant Applied To Your Job (<?php echo e($job->title); ?>) 
    </p>
    <p><strong><u>Application Details</u></strong></p>
    <p><strong>Name: </strong><?php echo e($application->full_name); ?></p>
    <?php if($application->contact_phone): ?>
        <p><strong>Phone: </strong><?php echo e($application->contact_phone); ?></p>
    <?php endif; ?>
    <p><strong>Email: </strong><?php echo e($application->contact_email); ?></p>
    <?php if($application->location): ?>
        <p><strong>Location: </strong><?php echo e($application->location); ?></p>
    <?php endif; ?>
    <?php if($application->message): ?>
        <p><strong>Message: </strong><?php echo e($application->message); ?></p>
    <?php endif; ?>
    <p>
        Login To JobDock Account To View The Application
    </p>
    
</body>
</html><?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/emails/job-applied.blade.php ENDPATH**/ ?>