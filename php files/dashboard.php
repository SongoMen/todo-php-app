<?php
    include('session.php');
    include('config.php');

    $date = date('d-m-Y');
    echo $date;

    $xxxx = "SELECT Task,Task_date FROM `{$user_check}`";
    $result = mysqli_query($conn, $xxxx);

    $name = $user_check;

    mysqli_close($conn);
?>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css files/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
    <div id = "black-bg" class="black-bg" hidden>
    </div>   
    <div class="context" hidden>
        <div class="context_item"> 
            <div class="inner_item" id="newTask">
            Create new task
            </div> 
        </div>
        <div class="context_item"> 
            <div class="inner_item">
            Cut
            </div> 
        </div>
        <div class="context_item"> 
            <div class="inner_item">
            Paste
            </div> 
        </div>
        <div class="context_hr"></div>
        <div class="context_item"> 
            <div class="inner_item last" id="logout">
            Log Out
            </div> 
        </div>
    </div>
    <div class="left-bar">

    </div>

    <div class="dashboard" id="dashboard">
        <p class="bg-name"><?php echo $user_check; ?></p>
        <svg id="task-add" class="task-add" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.42 14.42">
            <defs>
                <style>.cls-1{fill:#fff;}.cls-2{width:100px; height:100px; fill:#f44242;}</style>
            </defs>
            <rect class="cls-1" x="2.35" y="3" width="8.81" height="8.06"/>
            <path class="cls-2" d="M12.94,4.85a7.21,7.21,0,1,0,6.21,6.21A7.22,7.22,0,0,0,12.94,4.85ZM15,12.6H12.6V15a.61.61,0,0,1-.61.61h0A.58.58,0,0,1,11.4,15V12.6H9A.58.58,0,0,1,8.4,12v0A.58.58,0,0,1,9,11.4H11.4V9A.61.61,0,0,1,12,8.4h0A.58.58,0,0,1,12.6,9V11.4H15a.61.61,0,0,1,.61.61h0A.58.58,0,0,1,15,12.6Z" transform="translate(-4.79 -4.79)"/>
        </svg>
        <div class="dashboard__timeline" id="dashboard__timeline">
            <div class="timeline-1">
                <h1>Tasks for Today</h1>
                <h2>TODAY</h2>
                <?php
                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Task Name</th><th>Date</th><th> </th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $idName = $row["Task"];
                        echo "<tr><td>".$row["Task"]."</td><td>".$row["Task_date"]."</td><td>        
                        <input type='checkbox' id='$idName' name='$idName' value='' />
                        <label for='$idName'>
                          <span></span>
                        </label></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            <div class="timeline-2">

            </div>
            <div class="timeline-3">

            </div>
        </div>
        <h1 class="dashboard__welcome">Welcome <p><?php echo $user_check; ?></p> </h1>
        <div class="dashboard__taskadd" id="dashboard__taskadd" hidden>
            <div class="taskadd__name">
                Name
            </div>

            <footer>
                <div class="taskadd__back" id="taskadd__back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" style="transform:rotate(180deg)" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" fill="#bdc3c7" /></svg>
                    <p>Go Back</p>
                </div>
                <div class="taskadd__next" id="taskadd__next">
                    <p>Next</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" /></svg>
                    
                </div>
            </footer>   
        </div>
    </div>
    <script src="../js files/dashboard.js"></script>
</body>
</html>