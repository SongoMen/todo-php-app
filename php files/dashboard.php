<?php
include('session.php');
include 'ChromePhp.php';
include('config.php');

$date = date('d-m-Y');

$xxxx = "SELECT Task,Task_date FROM `{$user_check}`";
$result = mysqli_query($conn, $xxxx);

$name = $user_check;

if(isset($_POST['submit'])){
    $taskName=$_POST['task-name'];
    $taskDate=$_POST['task-date'];
    
    $query = "INSERT INTO $name (`Task`,`Task_date`) VALUES ('$taskName', '$taskDate')";
    header('Location: dashboard.php');
    mysqli_query($conn, $query);
}

mysqli_close($conn);
?>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css files/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
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
        <svg id="button-logout" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><g data-name="Group"><path data-name="Path" d="M70.1,33.4l-4.2,4.2L75.3,47H28.5v6H75.3l-9.4,9.4,4.2,4.2L84.7,52.1a3,3,0,0,0,0-4.2Z"/><path data-name="Path" d="M44.2,70.4H20.5V29.6H44.2V40h6V26.6a3,3,0,0,0-3-3H17.5a3,3,0,0,0-3,3V73.4a3,3,0,0,0,3,3H47.2a3,3,0,0,0,3-3V60h-6Z"/></g></svg>
    </div>
    <div class="dashboard" id="dashboard">
        <p class="bg-name"><?php echo $user_check; ?></p>
        <svg id="task-add" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 96 120" enable-background="new 0 0 96 96" xml:space="preserve"><path d="M79.122,13.679H16.878c-3.3,0-5.985,2.685-5.985,5.986v56.67c0,3.3,2.685,5.985,5.985,5.985h62.244  c3.3,0,5.985-2.685,5.985-5.985v-56.67C85.107,16.365,82.423,13.679,79.122,13.679z M60.048,49.445H49.445v10.603h-2.891V49.445  H35.952v-2.891h10.603V35.952h2.891v10.602h10.603V49.445z"/></svg>
        <div class="dashboard__timeline" id="dashboard__timeline">
            <div class="timeline-1">
                <div class="timeline-1__day">
                    TODAY
                </div>

                    <div class="timeline-1__table">
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Task Name</th><th>Date</th><th> </th></tr>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $idName = $row["Task"];
                            echo "<tr class='$idName'><td>" . $row["Task"] . "</td><td>" . $row["Task_date"] . "</td><td>        
                            <input type='checkbox' class='table__items' id='$idName' name='$idName' value='' />
                            <label for='$idName'>
                            <span></span>
                            </label></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo " <div class='timeline-text'> You dont have any tasks for today</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="timeline-2">

            </div>
            <div class="timeline-3">

            </div>
        </div>
        <h1 class="dashboard__welcome">Welcome <p><?php echo $user_check; ?></p> </h1>
        <div class="dashboard__taskadd" id="dashboard__taskadd" hidden>
            <form method="POST">
                <label for="name">Task Name</label>
                <input type="text" autocomplete="off" require name="task-name">
                <label for="name">Choose date</label>
                <input autocomplete="off" class="js-date" name="task-date" type="text" placeholder="dd/mm/yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" require>
                <footer>
                    <div class="taskadd__back" id="taskadd__back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" style="transform:rotate(180deg)" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" fill="#bdc3c7" /></svg>
                        <p>Go Back</p>
                    </div>
                    <button name="submit" type="submit" class="taskadd__next" id="taskadd__next">
                        <p>Next</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" /></svg>
                </button>
                </footer>   
            </form>
        </div>
    </div>
    <script>
        $(".table__items").click(function(event){
            var checkedValue = $('.table__items:checked').val();
            if(document.getElementById( event.target.id).checked === true){
                $('.'+event.target.id).addClass("strikeout")
                $('.'+event.target.id).css({color: "#bdc3c7"})
                value=45
                $( "<style>tr::after { top:" + 45 +" %}</style>" ).appendTo( "head" )
                $( "<style>tr::before { top:" + 45 +"%}</style>" ).appendTo( "head" )
            }
            else{
                $('.'+event.target.id).css({color: "black"})
                $('.'+event.target.id).removeClass("strikeout")
            };
        })
    </script>
    <script src="../js files/dashboard.js"></script>
</body>
</html>