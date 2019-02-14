<!DOCTYPE html>
<html>

<head>
    <title>My Website</title>
</head>
<body>
<div style="margin-left: 15%">
<h1>Welcome to</h1>
    <h2 style="display: inline; border: solid black 1px"><span style="color: red; border: 1px solid black">My </span> <span style="color: darkgoldenrod; border: 1px solid black">Website</span></h2>
</div>
<hr style="border-top: dashed 3px">
    <div style="float: left; margin-left: 35%;">
<div>
    <form action="derrick.php" method="get">
        <label>Your Name</label>
        <input type="text" name="name" style="margin-top: 3%; margin-right: 20px">
        <br>
        <label>Address &nbsp;&nbsp;&nbsp;&nbsp; </label>
        <input type="text" name="address" style="margin-right: 20px">
        <br>
        <Label> Zip Code&nbsp;&nbsp;&nbsp; </Label>
        <input type="text" name="zipCode">
        <button type="submit" value="Submit" style="margin: 3% 0 0 53%">Submit</button>
    </form>
</div>
        <div style="text-align: center;">
            <span style="margin-left: 35%"></span>
<?php
if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['address'])&& !empty($_GET['name'])
&& isset($_GET['zipCode'])&& !empty($_GET['zipCode']))
  {
  $name = $_GET["name"];
  $address=$_GET["address"];
  $zip = $_GET['zipCode'];
    echo $name, PHP_EOL;
    echo "\r\n";
    echo $address, PHP_EOL;
    echo $zip, PHP_EOL;    

  }
else
{
echo "Please enter information and try again.";
}
?>
     
        </div>
    </div>
    <br>
    

</body>
</html> 