<?php
include('session.php');
include('config.php');

$date = date('d/m/Y');

$xxxx = "SELECT Task,Description,Done FROM `{$user_check}` where Done = 0 ";
$result = mysqli_query($conn, $xxxx);

$xxxx2 = "SELECT Task,Description,Done FROM `{$user_check}` WHERE Done = 1";
$result2 = mysqli_query($conn, $xxxx2);

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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="../css files/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="icon" href="../images/favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js files/jquery.visible.js"></script>
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
    <h1 class="bar__welcome">Welcome <p><?php echo $user_check; ?></p> </h1>
        <ul>
            <li style='color:#f44242;'><svg width="30" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" x="0px" y="0px" viewBox="0 0 100 125"><g transform="translate(0,-952.36218)"><path style="fill:#f44242; text-indent:0;text-transform:none;direction:ltr;block-progression:tb;baseline-shift:baseline;enable-background:accumulate;" d="m 49.64027,963.37875 a 3.0003,3.0003 0 0 0 -1,0.3125 L 5.6402699,985.69124 a 3.0003,3.0003 0 0 0 0,5.3438 L 48.64027,1013.035 a 3.0003,3.0003 0 0 0 2.75,0 l 42.999996,-21.99996 a 3.0003,3.0003 0 0 0 0,-5.3438 L 51.39027,963.69125 a 3.0003,3.0003 0 0 0 -1.75,-0.3125 z m 0.375,6.37499 36.406196,18.625 -36.406196,18.59376 -36.4062,-18.59376 36.4062,-18.625 z m -43.0625001,29.5938 a 3.0003,3.0003 0 0 0 -1.3125,5.68746 l 43.0000001,22 a 3.0003,3.0003 0 0 0 2.75,0 l 42.999996,-22 a 3.0049417,3.0049417 0 1 0 -2.75,-5.34376 L 50.01527,1020.9725 8.3902699,999.69124 a 3.0003,3.0003 0 0 0 -1.4375,-0.3437 z m 0,13.99996 a 3.0003,3.0003 0 0 0 -1.3125,5.6875 l 43.0000001,22 a 3.0003,3.0003 0 0 0 2.75,0 l 42.999996,-22 a 3.0049417,3.0049417 0 1 0 -2.75,-5.3438 L 50.01527,1034.9725 8.3902699,1013.6912 a 3.0003,3.0003 0 0 0 -1.4375,-0.3437 z" fill="#000000" fill-opacity="1" stroke="none" marker="none" visibility="visible" display="inline" overflow="visible"/></g></svg>Dashboard</li>
            <li><svg style="margin-bottom:5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 482.9 482.9" xml:space="preserve" width="30px" height="30px">
                    <g>
                        <path d="M239.7,260.2c0.5,0,1,0,1.6,0c0.2,0,0.4,0,0.6,0c0.3,0,0.7,0,1,0c29.3-0.5,53-10.8,70.5-30.5    c38.5-43.4,32.1-117.8,31.4-124.9c-2.5-53.3-27.7-78.8-48.5-90.7C280.8,5.2,262.7,0.4,242.5,0h-0.7c-0.1,0-0.3,0-0.4,0h-0.6    c-11.1,0-32.9,1.8-53.8,13.7c-21,11.9-46.6,37.4-49.1,91.1c-0.7,7.1-7.1,81.5,31.4,124.9C186.7,249.4,210.4,259.7,239.7,260.2z     M164.6,107.3c0-0.3,0.1-0.6,0.1-0.8c3.3-71.7,54.2-79.4,76-79.4h0.4c0.2,0,0.5,0,0.8,0c27,0.6,72.9,11.6,76,79.4    c0,0.3,0,0.6,0.1,0.8c0.1,0.7,7.1,68.7-24.7,104.5c-12.6,14.2-29.4,21.2-51.5,21.4c-0.2,0-0.3,0-0.5,0l0,0c-0.2,0-0.3,0-0.5,0    c-22-0.2-38.9-7.2-51.4-21.4C157.7,176.2,164.5,107.9,164.6,107.3z" />
                        <path d="M446.8,383.6c0-0.1,0-0.2,0-0.3c0-0.8-0.1-1.6-0.1-2.5c-0.6-19.8-1.9-66.1-45.3-80.9c-0.3-0.1-0.7-0.2-1-0.3    c-45.1-11.5-82.6-37.5-83-37.8c-6.1-4.3-14.5-2.8-18.8,3.3c-4.3,6.1-2.8,14.5,3.3,18.8c1.7,1.2,41.5,28.9,91.3,41.7    c23.3,8.3,25.9,33.2,26.6,56c0,0.9,0,1.7,0.1,2.5c0.1,9-0.5,22.9-2.1,30.9c-16.2,9.2-79.7,41-176.3,41    c-96.2,0-160.1-31.9-176.4-41.1c-1.6-8-2.3-21.9-2.1-30.9c0-0.8,0.1-1.6,0.1-2.5c0.7-22.8,3.3-47.7,26.6-56    c49.8-12.8,89.6-40.6,91.3-41.7c6.1-4.3,7.6-12.7,3.3-18.8c-4.3-6.1-12.7-7.6-18.8-3.3c-0.4,0.3-37.7,26.3-83,37.8    c-0.4,0.1-0.7,0.2-1,0.3c-43.4,14.9-44.7,61.2-45.3,80.9c0,0.9,0,1.7-0.1,2.5c0,0.1,0,0.2,0,0.3c-0.1,5.2-0.2,31.9,5.1,45.3    c1,2.6,2.8,4.8,5.2,6.3c3,2,74.9,47.8,195.2,47.8s192.2-45.9,195.2-47.8c2.3-1.5,4.2-3.7,5.2-6.3    C447,415.5,446.9,388.8,446.8,383.6z"/>
                    </g>
                </svg>Profile
            </li>
        </ul>
        <a href="logout.php"><svg id="button-logout" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><g data-name="Group"><path data-name="Path" d="M70.1,33.4l-4.2,4.2L75.3,47H28.5v6H75.3l-9.4,9.4,4.2,4.2L84.7,52.1a3,3,0,0,0,0-4.2Z"/><path data-name="Path" d="M44.2,70.4H20.5V29.6H44.2V40h6V26.6a3,3,0,0,0-3-3H17.5a3,3,0,0,0-3,3V73.4a3,3,0,0,0,3,3H47.2a3,3,0,0,0,3-3V60h-6Z"/></g></svg></a>
    </div>
    <div class="dashboard" id="dashboard">
        <!--<p class="bg-name"><?php echo $user_check; ?></p>-->
        <div class="dashboard__todo">
            <div style="display:flex;align-items:center;justify-content:center;">
                <div class="column__box"> TODO</div>
            </div>
            <div class="tasks">
            <div class="addTask"></div>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if($idName = $row["Done"] == 01){
                            $class = "strikeout";
                            $input = "checked";
                            $color = "#7f8489";
                        }
                        else{
                            $class = "";
                            $input = "unchecked";
                            $color = "white";
                        }
                        $idName = $row["Task"];
                        echo "<div style = 'color: $color;transition: all .5s' class='todo__elem $idName'><div style='display:flex; width:100%; align-items:center; justify-content:
                        space-between;'>" . $row["Task"] . "
                        <input type='checkbox' class='table__items' id='$idName' name='$idName' $input value='' />
                        <label style='padding:10px;' for='$idName'>
                        <span ></span>
                        </label></div></div>";
                    }
                } else {
                    echo " <div class='column-text'> You're all caught up.</div>";
                }
            ?>
            </div>
        </div>
        <div class="dashboard__done">
            <div class="column__box">
                <div> DONE</div>
            </div>
            <div class="tasks2">
            <?php
                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        if($idName = $row["Done"] == 01){
                            $class = "strikeout";
                            $input = "checked";
                            $color = "#7f8489";
                        }
                        else{
                            $class = "";
                            $input = "unchecked";
                            $color = "white";
                        }
                        $idName = $row["Task"];
                        echo "<div style = 'color: $color;transition: all .5s' class='todo__elem $idName'><div style='display:flex; width:100%; align-items:center; justify-content: space-between;'>" . $row["Task"] . "
                        <input type='checkbox' class='table__items' id='$idName' name='$idName' $input value='' />
                        <label style='padding:10px;' for='$idName'>
                        <span ></span>
                        </label></div></div>";
                    }
                } else {
                    echo " <div class='column-text2'> You didn't do any tasks.</div>";
                }
            ?></div>
        </div>
        <svg id="task-add" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 96 120" enable-background="new 0 0 96 96" xml:space="preserve"><path d="M79.122,13.679H16.878c-3.3,0-5.985,2.685-5.985,5.986v56.67c0,3.3,2.685,5.985,5.985,5.985h62.244  c3.3,0,5.985-2.685,5.985-5.985v-56.67C85.107,16.365,82.423,13.679,79.122,13.679z M60.048,49.445H49.445v10.603h-2.891V49.445  H35.952v-2.891h10.603V35.952h2.891v10.602h10.603V49.445z"/></svg>
    </div>
    <script src="../js files/dashboard.js"></script>
</body>
</html>
