<!DOCTYPE html>
<html style="background-color: gray">

<head>
    <title>Pay Calculator</title>
</head>

<body>
    <div style="margin-left: 15%">
        <h1>Welcome to</h1>
        <h2 style="display: inline; border: solid black 1px">
            <span style="color: red; border: 1px solid black">My Pay</span>
            <span style="color: darkgoldenrod;"> Calculator</span>
        </h2>
    </div>
    <hr style="border-top: dashed 3px">
    <div style="float: left; margin-left: 35%;">
        <div>
            <form style="display: table" action="derrick.php" method="get">

                <p style="display: table-row">
                    <label style="display:table-cell">Your Name: </label>
                    <input type="text" name="name" value="<?php echo $_GET["name"] ?>" style="margin-top: 3%; margin-right: 20px; display:table-cell">
                </p>

                <p style="display: table-row">
                    <label style="display:table-cell">Hours: </label>
                    <input type="text" name="hours" value="<?php echo $_GET["hours"] ?>" style="margin-right: 20px; display:table-cell">
                </p>

                <p style="display: table-row">
                    <Label style="display:table-cell">Rate of Pay: </Label>
                    <input type="text" name="payRate" value="<?php echo $_GET["payRate"] ?>"  style="display: table-cell">
                </p>
                <button type="submit" value="Submit" style="text-align:center; float: right">Submit</button>
            </form>
        </div>
        <div style="text-align: center;">
            <span style="margin-left: 35%"></span>
            <?php
if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['hours']) && is_numeric($_GET['hours']) && is_numeric($_GET['payRate']) && !empty($_GET['payRate'])) {
    $name = $_GET["name"];
    $hours = $_GET["hours"];
    $payRate = $_GET['payRate'];
    // echo "<br>" . $name ."<br>" ;
    // echo $hours . "<br>";
    // echo $payRate . "<br>";

    if ($hours > 40) {
        $overtime_hours = $hours - 40;
        $hours = 40;
    } else {
        $overtime_hours = 0;
    }
    
    
    $total_weekly_earnings = ($payRate * $hours) + ($overtime_hours * ($payRate * 1.5));
    echo "<br>" . "Your total earnings for the week is: $" . number_format($total_weekly_earnings, 2);


} else {
    echo "<br>" . "Please enter information and try again.";
}
?>

        </div>
    </div>
    <br>


</body>

</html>