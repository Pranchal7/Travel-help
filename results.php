<!doctype html>
<html>
    <head>
      <title>
        jbjhfbhf
        </title>
        <style>
            #total{
                
                width:100%;
        
            }
            #header{
                
                width:100%;
                height:80px;
                border:1px solid black;
            }
            #logo{
                float:left;
            }
            #nav{
                float:right;
            }
            #nav li{
                list-style-type: none;
                display:inline;
                margin:30px;
            }
            #nav li a{
                text-decoration: none;
                
            }
            #container{
                
                width:100%;
                   border:1px solid black;
                
            }
            #footer{
                
                width:100%;
                
                border:1px solid black;
            }
            #container{
                
                background-color: blueviolet;
                
                height:600px; 
            }
            #searchcity{
                position:absolute;
                left:40%;
                top:40%;
            }
            #ques{
                position: absolute;
                left:44%;
                top:60%;
            }
            #question{
                width:100%;
                height:300px;
                display:none;
                position:fixed;
                top:0;
                left:0;
                width:100%;
                border:1px solid black;
                height:100%;
            }
            #questable{
                text-align: center;
                position:absolute;
                top:40%;
                left:45%;
            }
            .data{
                width:100%;
                border:1px solid black;
                height:350px;
                margin-top:20px;
              
            }
            .image img{
                float:left;
                height:350px;
                width:44%;
                  margin-right:20px;
    
            }
            .right{
                width:66%;
            }
        </style>
    </head>
    <body>
      <div id="total">
        <div id="header">
          <div id="logo">logo</div>
          <div id="nav">nav
            <ul>
              <li><a href="#">HOME</a></li>
              <li><a href="#">ABOUT US</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">SIGN UP</a></li>
              <li><a href="#">LOG IN</a></li>
                <input type="text" name="search" value="search" />
                <input type="submit" name="submit" value="search" />
             
              </ul>
            </div>
          </div>
          <?php
           $con=mysqli_connect('localhost','root','','travelguide');

           if(isset($_POST['quessubmit']))
           {
            global $con;
            $days=$_POST['days'];
            $weather=$_POST['weather'];
            $age=$_POST['age'];
            $price=$_POST['price'];
            $purpose=$_POST['purpose'];
            $query="select distinct loc_image,main.loc_id,loc_name,loc_days,loc_price,loc_weather from main,agegroup,purpose
            where (purpose='$purpose' or age_group='$age') and agegroup.loc_id=main.loc_id and main.loc_id=purpose.loc_id and loc_price<='$price' and loc_days<='$days'";
            $run_result=mysqli_query($con,$query);
            if($run_result){
                while($row=mysqli_fetch_array($run_result)){
                    global $con;
                    $rowid=$row['loc_id'];
                    $rowname=$row['loc_name'];
                    $rowimage=$row['loc_image'];
                    $rowprice=$row['loc_price'];
                    $rowday=$row['loc_days'];
                    $rowweather=$row['loc_weather'];
                    $query1="select attraction from mainattraction where loc_id ='$rowid'";
                    $run_query=mysqli_query($con,$query1);
                    $att=array();
                    while($attrac=mysqli_fetch_array($run_query))
                    {
                        $att[]=$attrac['attraction'];
                    }
                    echo "<div class='data'>
                      <div class='image'>
                      <img src='$rowimage' /></div>
                      <div class='right'>
                      <table>
                       <tr><td colspan='4' align='center'><h2>$rowname</h2></td></tr>
                       <tr>
                       <td align='right'>Price:</td>
                       <td>$rowprice</td>
                       <td>Days:</td>
                       <td align='left'>$rowday</td>
                       </tr>
                       
                       <tr>
                       
                        <td align='right'>Weather:</td>
                       <td>$rowweather</td>
                       <td>Pin-code:</td>
                       <td  align='left'>$rowid</td>
                       
                       
                       
                       </tr>
                       <tr>
                       <td colspan='4' align='center'><h3> Main Attraction:</h3></td>
                       </tr>                  
                      </table>
                      <ul>
                        <li> $att[0]</li>
                        <li> $att[1]</li>
                        <li> $att[2]</li>
                        <li> $att[3]</li>
                      
                      
                      
                      </ul>
                      </div>
                      
                    </div>
                    ";
                 }
            }
             else{
                 echo "0 Result";
             }  
               
               
               
           }
          
          ?>
        <div id="footer">@ copyright</div>
        </div>
    </body>
</html>