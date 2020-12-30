<?php
    
	
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sign']))
    {
     if (array_key_exists('email', $_POST) AND array_key_exists('pwd', $_POST)) {
        
        $link = mysqli_connect("localhost", "root", "abcd", "kid");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
        if ($_POST['email'] == '') {
            
            echo"<Email address is required.</h1>";
            
        } else if ($_POST['pwd'] == '') {
            
            echo "<h1>Password is required.</h1>";
            
        } else {
            
            $query = "SELECT `id` FROM `signup` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
				echo '<script type="text/JavaScript"> prompt("That email address has already been taken.");</script>';
                
                
                
            } else {
                
                $query = "INSERT INTO `signup` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['pwd'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo '<script type="text/JavaScript"> prompt("You have been signed up!")</script>';
                    
                } else {
                    
                    echo '<script type="text/JavaScript"> prompt("There was a problem signing you up - please try again later.")</script>';
                    
                }
                
            }
            
        }
        
      }
	 }
	   

	 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['log']))
     {
     if (array_key_exists('email', $_POST) AND array_key_exists('pwd', $_POST)) {
        
        $link = mysqli_connect("localhost", "root", "abcd", "kid");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
        if ($_POST['email'] == '') {
            
            echo "<h1>Email address is required.</h1>";
            
        } else if ($_POST['pwd'] == '') {
            
            echo "<h1>Password is required.</h1>";
            
        } else {
            
            $query = "SELECT * FROM `signup` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' AND password='".mysqli_real_escape_string($link, $_POST['pwd'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                session_start();
				$_SESSION['user']=$_POST['email'];
			    header('location: play.php');
		      	
			  
			}
			else {
			echo '<script type="text/JavaScript"> prompt("Incorrect ID/Password OR Non-existing.")</script>';  
              } 
	 }}}
?>


<!DOCTYPE html>
<html lang="en">
<head> 
  <title>kid</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style TYPE="text/css">



 @KEYFRAMES CHANGE{

                    FROM{BACKGROUND-COLOR:BLACK;}
                    TO{BACKGROUND-COLOR:#e6e6e6;}


                    }



  
  .BACK{ 
      
       BACKGROUND-COLOR:#e6e6e6;
       ANIMATION-NAME:CHANGE;
       ANIMATION-DURATION:10S;
       ANIMATION-ITERATION-COUNT:INFINITE;
       ANIMATION-DIRECTION:ALTERNATE;
       
       }


  .BACK1{
       
       BACKGROUND-COLOR:BLACK;
       COLOR:#1a8cff; 
       TEXT-ALIGN:CENTER;
       FONT-SIZE:3vw;
       MARGIN: 0 AUTO;
       TEXT-DECORATION:BOLD;
       TEXT-SHADOW:0.11vw 0.11vw  #e6e6e6;
       OVERFLOW:HIDDEN;
     
       }

  .BACK3{
       
       BACKGROUND-COLOR:#e6e6e6;;
       COLOR:#1a8cff; 
       TEXT-ALIGN:JUSTIFY;
       HEIGHT:2.5vw;
       FONT-SIZE:1vw;
       MARGIN: 0 AUTO;
       PADDING:0 px;
       
       }
     
 
    A:HOVER{
          BACKGROUND-COLOR:#1a8cff;
          COLOR:BLACK;
         }
  

  </style>


</head>
<body style="width:100vw;" >





  <div class="container-fluid"  style="width:100vw;" >
   <div class="row" style="width:100vw;" >
     <div class="col BACK"></div>
     <div class="col BACK1 "> G<I STYLE="COLOR:WHITE;FONT-SIZE:4.5vw;">AM</I>E&nbsp;<IMG  SRC="logo.JPG" STYLE="HEIGHT:100%;WIDTH:30%;"> Z<I STYLE="COLOR:WHITE;FONT-SIZE:4.5vw;">ON</I>E</div>
     <div class="col BACK"></div>
   </div>
  </div>
 
 


  <div class="container-fluid" style="BACKGROUND-COLOR:BLACK;height:0.5vw;">
     <div class="row" style="width:100vw;"> </div>
    
  </div>

  <div class="cotainer-fluid" style="BACKGROUND-COLOR:#e6e6e6;height:0.5vw;">     
     <div class="row" style="width:100vw;"> </div>
  </div>

  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black; height:0.2vw;">     
     <div class="row" style="width:100vw;"> </div>
  </div>

  


  <div class="cotainer-fluid "   style="width:100vw">
       
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">

  
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">HOME</a>
        </li>
    

    
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">GAMES</a>
           <div class="dropdown-menu">
              <a class="dropdown-item" href="play2.php">BAT & BALL</a>

           </div>
        </li>
       </ul>

     
     

    <form class="form-inline"  method="post" >
 
     <input type="email" class="form-control mb-2 mr-sm-2"  placeholder="Enter email" id="email"  name="email" style="POSITION:RELATIVE;left:42vw;" required="required">
    
     <input type="password" class="form-control mb-2 mr-sm-2"  placeholder="Enter password" id="pwd" name="pwd" style="POSITION:RELATIVE;left:43vw;" required="required">
   
 

     <button type="submit" class="btn btn-primary mb-2"  action="" style="POSITION:RELATIVE;left:44vw;" name="log"  >LOGIN</button>
	 
     <button type="submit" class="btn btn-primary mb-2" action="signup.php" style="POSITION:RELATIVE;left:45vw;" name="sign"  >SIGN UP</button>

    </form>
    </nav>
    
  </div>
  
  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black; height:0.2vw;">     
  </div>

  <div class="cotainer-fluid" style="BACKGROUND-COLOR:#e6e6e6;height:0.5vw;">     
  </div>


  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black;height:0.5vw;">     
  </div>


  <div class="container-fluid"  style="BACKGROUND-COLOR:#e6e6e6; height:50vw;">
 
      
    <DIV >
        
      <A HREF="play2.php"><IMG  SRC="BALL.JPG"   STYLE="HEIGHT:16vw;WIDTH:12vw;POSITION:RELATIVE ;top:2vw;left:1.5vw;  "> </A>
      <A HREF="play2.php"><IMG  SRC="BAT.JPG"    STYLE="HEIGHT:16vw;WIDTH:8vw;POSITION:RELATIVE;top:2vw;left:1vw;"></A>
      
     
     <A HREF="play2.php" > <P STYLE="COLOR:BLACK ; FONT-SIZE:2VW;POSITION:RELATIVE;top:2vw;left:6.5vw;PADDING:0PX;">BAT & BALL </P></A>
    </DIV>
  </div>
  
  </div>
  
  </div>



</body>
</html>