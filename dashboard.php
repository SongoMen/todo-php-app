<?php
   include('session.php');
?>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
    <div class="left-bar">

    </div>

    <div class="dashboard" id="dashboard">

        <p class="bg-name"><?php echo $user_check; ?></p>

        <svg id="task-add" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.42 14.42">
            <defs>
                <style>.cls-1{fill:#fff;}.cls-2{width:100px; height:100px; fill:#f44242;}</style>
            </defs>
            <rect class="cls-1" x="2.35" y="3" width="8.81" height="8.06"/>
            <path class="cls-2" d="M12.94,4.85a7.21,7.21,0,1,0,6.21,6.21A7.22,7.22,0,0,0,12.94,4.85ZM15,12.6H12.6V15a.61.61,0,0,1-.61.61h0A.58.58,0,0,1,11.4,15V12.6H9A.58.58,0,0,1,8.4,12v0A.58.58,0,0,1,9,11.4H11.4V9A.61.61,0,0,1,12,8.4h0A.58.58,0,0,1,12.6,9V11.4H15a.61.61,0,0,1,.61.61h0A.58.58,0,0,1,15,12.6Z" transform="translate(-4.79 -4.79)"/>
        </svg>
        <div class="dashboard__timeline" id="dashboard__timeline">
            <div class="timeline-1">

            </div>
            <div class="timeline-2">

            </div>
            <div class="timeline-3">

            </div>
        </div>
        <h1 class="dashboard__welcome">Welcome <p><?php echo $user_check; ?></p> </h1>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>