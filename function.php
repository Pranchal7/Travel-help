<?php
$con=mysqli_connect('localhost','root','','travelguide');

function getPrice(){
    
    global $con;
   $get_cats="select distinct loc_price from main ";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_title=$row_cats['loc_price'];
        echo"<option value='$cat_title'>$cat_title</option>";
    }
    
    
}

function getDays(){
    
    global $con;
   $get_cats="select distinct loc_days from main order by loc_days";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_title=$row_cats['loc_days'];
        echo"<option value='$cat_title'>$cat_title</option>";
    }
    
    
}
function getWeather(){
    
    global $con;
   $get_cats="select distinct loc_weather from main";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_title=$row_cats['loc_weather'];
        echo"<option value='$cat_title'>$cat_title</option>";
    }
    
    
}
function getAge(){
    
    global $con;
   $get_cats="select distinct age_group from agegroup order by age_group";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_title=$row_cats['age_group'];
        echo"<option value='$cat_title'>$cat_title</option>";
    }
    
    
}
function getPurpose(){
    
    global $con;
   $get_cats="select distinct purpose from purpose";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_title=$row_cats['purpose'];
        echo"<option value='$cat_title'>$cat_title</option>";
    }
    
    
}
?>