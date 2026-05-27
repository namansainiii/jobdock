{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs for you</title>
</head>
<body>
    <h1><?php echo $title?></h1>
    <ul>
        <?php foreach($jobs as $job) : ?>
            <!-- for security purpose , in blade alot of things are build in -->
        <li> <?php echo htmlspecialchars($job, ENT_QUOTES , 'UTF-8'); ?> </li>
        <?php endforeach ?>
    </ul>

    <button><a href='<?php echo $url?>'>Create New Job</a></button>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs for you</title>
</head>
<body>
    <h1>{{$title}}</h1>

    {{-- @if(!empty($jobs))
    <ul>
        @foreach($jobs as $job)
        <li> {{$job}} </li>
        @endforeach
    </ul>
    @else <p1>No jobs present<br></p1>
    @endif --}}

    <ul>
    @forelse($jobs as $job)

    {{-- @if($job == 'Php Developer')
    @break it will not print after thi
    @continue it will skip the spcific and print further
    @endif --}}


    {{-- these all are used in case of foreach and forelse loops --}}
    {{-- <li> <u>{{$job}} </u><br> Index of the item: {{$loop->index}} <br> Iteration Number of the item:{{$loop->iteration}} <br>Items remaiming in the loop: {{$loop->remaining}} <br>Count of loop :{{$loop->count}}<br> ---------------------------------------------------- </li> --}}

    {{-- @if($loop->first)
    <li>First ever job posted: <u>{{$job}}</u></li>
    @elseif($loop->last)
    <li>Lats job posted: <u>{{$job}}</u></li>
    @elseif($loop->even)
    <li>This is EVEN number placed job: {{$job}}</li>
    @elseif($loop->odd)
    <li>This is ODD number placed job: {{$job}}</li>
    @else
    <li>{{$job}}</li>
    @endif --}}
    
    <li>{{$job}}</li>
    @empty
    <p1>No jobs present<br></p1>
    @endforelse
    </ul>

    {{-- <button><a href={{$url}}>Create New Job</a></button> --}}
</body>
</html>