<!doctype html>
<?php
include("function.php");

?>
<html>
    <head>
      <title>
        jbjhfbhf
        </title>
        <style>
            body{
                background-color: black;
            }
            #total{
                
                width:100%;
        
            }
            #header{
                
                width:100%;
                position:fixed;
                z-index: 1;
                height:60px;
                top:0;
                border:1px solid black;
                 background-color: #403c3b;
            }
            #logo{
                float:left;
            }
            #nav{
                float:right;
               position: absolute;
                right:40px;
            }
            #nav li{
                list-style-type: none;
                display:inline;
                margin:30px;
            }
            #nav li a{
                text-decoration: none;
                color:wheat;
                font-family: sans-serif;
                font-size: 20px;
            }
            #container{
                
                width:100%;
                   border:1px solid black;
                
            }
            #footer{
                
                width:100%;
                height:130px;
                border:1px solid black;
                background-color: yellow;
            }
            #copyright{
                font-family: sans-serif;
                font-size: 20px;
                position:absolute;
                bottom:50px;
                
            }
            #container{
                
                  background-color: #cb6868;
                
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
                display:none;
                color:white;
                font-family: sans-serif;
                font-size: 22px;
                position:fixed;
                top:0;
                left:0;
                border:1px solid black;
                height:100%;
                 background-color: rgb(0,0,0);
                background-color: rgba(0,0,0,0.9);
                z-index: 2;
                animation-name: zoom;
                animation-duration: .6s;
            }
            @keyframes zoom{
                from{
                    transform:scale(0);
                    opacity: 0.0;
                }
                to{
                    transform:scale(1);
                    opacity:1.0;
                }
            }
            #questable{
                text-align: center;
                position:absolute;
                top:25%;
                left:15%;
              
                width:400px;
                height:450px;
                background-color: darkslategrey;
            }
            #heading{
                
                color:;
                font-family: serif;
                font-size: 24px;
                
                
                
            }
        
                .data{
                width:100%;
              
                height:350px;
                margin-top:20px;
                background-color: #403c3b;
                    color:white;
              word-spacing: 5px;
                font-stretch:extra-expanded;
                    font-family: fantasy;
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
            #close{
                position: fixed;
                top:20px;
                right:20px;
                cursor:pointer;
                font-family: monospace;
                font-size: 60px;
                transition:all .4s ease-out;
            }
            #close:hover{
         color: #bbb;
            }
            .right{
                float:right;
               
                width:50%;
            }
            table{
               
                margin-left: 20%;
            }
            .right ul{
                margin-left:20%;
            }
        </style>
    </head>
    <body>
      <div id="total">
        <div id="header">
          <div id="logo"></div>
          <div id="nav">
            <ul>
              <li><a href="#">HOME</a></li>
              <li><a href="#">ABOUT US</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">SIGN UP</a></li>
              <li><a href="#">LOG IN</a></li>
                <input type="text" name="search" placeholder="search" />
                <input type="submit" name="submit" value="search" />
             
              </ul>
            </div>
          </div>
        <div id="container">
            <div id="searchcity">          
                <input type="text" name="search_city" placeholder="city" />
                <input type="submit" name="city_button" value="search" />
           </div>
                <div id="ques">
                     <input type="submit" name="city_button" value="Enter This" />
                </div>
          
          </div>
          <?php
           $con=mysqli_connect('localhost','root','','travelguide');
            $query="select distinct loc_image,loc_id,loc_name,loc_days,loc_price,loc_weather from main order by rand() limit 3"; 
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
                       <td>$rowprice |</td>
                       <td>Days:</td>
                       <td align='left'>$rowday </td>
                       </tr>
                       
                       <tr>
                       
                        <td align='right'>Weather:</td>
                       <td>$rowweather |</td>
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

                ?>
          
              
          <div id="question">
             <form action="results.php" method="post" enctype="multipart/form-data">
                 <a id="close">X</a>
                 <table id="questable">
                     <tr id="heading"><td colspan="4">Choose Suitable Options</td></tr>
                     <tr><td>price range:</td>
                 <td colspan="5"><select name="price" type="select" required>
                    <option value="">select a type</option>

                   <?php
                     getPrice();
                     
                     ?>
                     </select></td></tr>
                     <tr><td>no. of days:</td>
                         <td>
                    <select name="days" type="select" required>
                    <option value="">select a type</option>

                 <?php getDays();
                        ?>
                             </select></td> </tr>
                     <tr> <td> weather:</td>
<td>                <select name="weather" type="select"  required>
                    <option  value="">select a type</option>

                    <?php getWeather();
                        ?>
                    
    </select></td></tr> 
                     <tr><td>
                         Age group:</td>
<td>                <select  name="age" type="select"  required>
                    <option value="">select a type</option>

                     <?php getAge();
                        ?>
                    
    </select> </td></tr>
                     <tr> <td>purpose:</td>
<td>               <select name="purpose" type="select"  required>
                    <option value="">select a type</option>
<?php getPurpose();
                        ?>
                     
    </select></td></tr> 
                     <tr>
                     <td colspan="4">
                         
                         <input type="submit" name="quessubmit" value="submit" />
                         </td></tr>
                 </table>
              </form>
              
              
              
              
              
          </div>
        <div id="footer"><div id="copyright">&copy; 2018 TravelGuide.com</div></div>
        </div>
           <script src="js/jquery-1.11.0.js"></script>
        <script>
          $(function(){
             $('#ques').on('click',function(){
                 $('#question').css('display','block');
                 $('#container').css('opacity','0.4');
                 
             }) ;
            $('#close').on('click',function(){
                
                  $('#question').css('display','none');
                 $('#container').css('opacity','1');
                
                
            })  ;
              
              
          });
        
        
        
        
        </script>
    </body>
</html>