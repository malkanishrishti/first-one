<?php

  
        
            $li = mysqli_connect("localhost", "root", "abcd", "kid");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
			
			 session_start();
		   $query = "SELECT * FROM `signup` WHERE email = '".mysqli_real_escape_string($li, $_SESSION['user'])."'";
            
           $result = mysqli_query($li, $query);
		   
            
           if (mysqli_num_rows($result) > 0)
		   {

			  
	            while( $row = mysqli_fetch_assoc($result) )
				{ 
				   $em=$row['email'];
                   $wins=$row['wins'];
				   $losses=$row['losses'];
		        }
		   }
		   
		   else
		    echo "not found".$_SESSION['user'];

 if( isset($_POST['RESTART']))
   {

        
        
	if(isset($_POST['wins']) or isset($_POST['losses']))
	{
			
			$w=$_POST['wins'];
		    $l=$_POST['losses'];
			
			$sql = "UPDATE signup SET wins='$w', losses='$l' WHERE email='".mysqli_real_escape_string($li, $_SESSION['user'])."' ";

              if (mysqli_query($li, $sql)) {
                       }
              else {
                 echo "Error updating record: " . mysqli_error($li);
                     }
		    }
	
		
		   $query = "SELECT * FROM `signup` WHERE email = '".mysqli_real_escape_string($li, $_SESSION['user'])."'";
            
           $result = mysqli_query($li, $query);
		   
            
           if (mysqli_num_rows($result) > 0)
		   {

			  
	            while( $row = mysqli_fetch_assoc($result) )
				{ 
				   $em=$row['email'];
                   $wins=$row['wins'];
				   $losses=$row['losses'];
		        }
			   
		   }
		   
		   else
		    echo "not found".$_SESSION['user'];
			
	   }

   if( isset($_POST['logout']))
   {
	    session_start();
        session_destroy(); 
        header("Location:index.php"); 
	   
	   
   }   

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

  <STYLE TYPE="text/css">



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
       HEIGHT:3vw;
       FONT-SIZE:1vw;
       MARGIN: 0 AUTO;
       PADDING:0 px;
       
       }
     
 
    A:HOVER{
          BACKGROUND-COLOR:#1a8cff;
          COLOR:BLACK;
         }
  

   @keyframes IMG1 {
  
             FROM{LEFT:0%;}
             TO{LEFT:80%;}
                   }
  
   @keyframes IMG2 {
             FROM{RIGHT:0%;}
             TO{RIGHT:80%;}
                   }

  .LOGO{
       BACKGROUND-COLOR:BLACK;
       COLOR:#1a8cff; 
       TEXT-ALIGN:CENTER;
       FONT-SIZE:2.5vw;
       MARGIN: 0 AUTO;
       TEXT-DECORATION:BOLD;
       TEXT-SHADOW:0.15vw 0.15vw #e6e6e6;
       
     
      }


  .BUTTON{
      BACKGROUND-COLOR:#595959;
      BORDER: 0.2vw GROOVE RED;
      BORDER-RADIUS:1vw ;
      FONT-SIZE:3vw;
      MARGIN: 0 AUTO;     
      TEXT-SHADOW:0.1vw 0.1vw WHITE; 
      TEXT-DECORATION:BOLD;COLOR:RED;
     
       }

  </STYLE>


</head>
<body style="width:100vw;" >





  <div class="cotainer-fluid" style="width:100vw;" >
   <div class="row" >
     <div class="col BACK"></div>
     <div class="col BACK1 "> G<I STYLE="COLOR:WHITE;FONT-SIZE:4.5vw;">AM</I>E <IMG  SRC="logo.JPG" STYLE="HEIGHT:100%;WIDTH:30%;"  ALT="IMAGE"> Z<I STYLE="COLOR:WHITE;FONT-SIZE:4.5vw;">ON</I>E</div>
     <div class="col BACK"></div>
   </div>
  </div>
 
 


  <div class="container-fluid" style="BACKGROUND-COLOR:BLACK;height:0.5vw;width:100vw;">
     <div class="row" > </div>
    
  </div>


  <div class="cotainer-fluid" style="BACKGROUND-COLOR:#e6e6e6;height:0.5vw;width:100vw;">     
     <div class="row" > </div>
  </div>


  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black; height:0.2vw;width:100vw;">     
     <div class="row" > </div>
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
              <a class="dropdown-item" href="play.php">BAT & BALL</a>

           </div>
        </li>
       </ul>

     
     

    <form class="form-inline" method="post"   id="myform" >
 
      <label for="email" name="em" style="COLOR:white;POSITION:RELATIVE;left:28vw;"><?php echo $em;?></label>

      <label for="wins" style="color:white;POSITION:RELATIVE;left:31vw;" >WINS : </label>
      <input type="text" class="form-control mb-2 mr-sm-2" style="width:10vw;POSITION:RELATIVE;left:32vw;" id="wins" name="wins"  value="<?php echo $wins; ?>" style="POSITION:RELATIVE;left:32vw;">

      <label for="loss" style="color:white;POSITION:RELATIVE;left:34vw;">LOSSES : </label>
      <input type="text" class="form-control mb-2 mr-sm-2"  style="width:10vw;POSITION:RELATIVE;left:35vw;" id="loss" name="losses" value="<?php echo $losses; ?>" style="POSITION:RELATIVE;left:35vw;">

     <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 "  STYLE="BACKGROUND-COLOR:#595959;POSITION:relative;TOP:0vw ;LEFT:37vw ; VISIBILITY:;"    name="logout" >LOGOUT</BUTTON>
 
    </form>
    </nav>
    
  </div>
  


  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black; height:0.2vw;">     
  </div>



  <div class="cotainer-fluid" style="BACKGROUND-COLOR:#e6e6e6;height:0.5vw;">     
  </div>



  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black;height:0.5vw;">     
  </div>



  <div class="cotainer-fluid" style="BACKGROUND-COLOR:#e6e6e6;height:1vw;">     
  </div>






  <div class="cotainer-fluid" style="BACKGROUND-COLOR:black;">
    <div class="row">  

        <div class="col" >
            <IMG  SRC="BALL.JPG"   STYLE="HEIGHT:6vw;WIDTH:8vw;POSITION:RELATIVE;FLOAT:LEFT;  ANIMATION-NAME:IMG1; ANIMATION-DURATION:10S; animation-timing-function:LINEAR;ANIMATION-ITERATION-COUNT:INFINITE;ANIMATION-DIRECTION:ALTERNATE;"   ALT="IMAGE">
        </div>

        <div class="col LOGO" STYLE="PADDING:0px; MARGIN:0px;  " >
		    <IMG  SRC="BAT.jpg"    STYLE="HEIGHT:6vw;WIDTH:5vw;FLOAT:LEFT;" ALT="IMAGE">
             B<I STYLE="COLOR:WHITE;FONT-SIZE:3.5vw;width:">A</I>T &nbsp; <I STYLE="COLOR:WHITE;FONT-SIZE:3.8vw;"> & </I> &nbsp; B<I STYLE="COLOR:WHITE;FONT-SIZE:3.5vw;">AL</I>L 
            <IMG  SRC="BAT2.JPG"  STYLE="HEIGHT:6vw;WIDTH:5vw;FLOAT:RIGHT;" ALT="IMAGE"> 
        </div>

        <div class="col" >
            <IMG  SRC="BALL2.JPG"   STYLE="HEIGHT:6vw;WIDTH:8vw;POSITION:RELATIVE;FLOAT:RIGHT;ANIMATION-NAME:IMG2; ANIMATION-DURATION:10S; animation-timing-function:LINEAR;ANIMATION-ITERATION-COUNT:INFINITE;ANIMATION-DIRECTION:ALTERNATE;"  ALT="IMAGE"> 
        </div>
   
    </div>
  </div>






  <div class="cotainer-fluid" style="BACKGROUND-COLOR:#e6e6e6;height:100vw; POSITION:RELATIVE ;"">
 
	 
     <div class="cotainer-fluid" style="POSITION:RELATIVE;">
     <BR>
     <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;TOP:0vw ;LEFT:40vw ; VISIBILITY:;" ID="START">START&nbsp; GAME</BUTTON>
        
     <BR> <BR>
     <div >
        <div class="row" >
           <div class="col"><LABEL FOR="TEAMNAME"  STYLE="FONT-SIZE:2.5vw ; POSITION:RELATIVE; LEFT:8vw; VISIBILITY: HIDDEN;"  ID="TEAMNAME" > ENTER&nbsp; TEAM&nbsp; NAME : </LABEL></div>
           <div class="col"><INPUT TYPE="TEXT" class="form-control"  STYLE="BACKGROUND-COLOR:WHITE; FONT-SIZE:2vw; WIDTH:30vw; POSITION:RELATIVE; LEFT:1vw; VISIBILITY:HIDDEN;"  ID="NAMEFIELD"></div> 
           <div class="col"><BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;FONT-SIZE:2vw; VISIBILITY:HIDDEN;" ID="SUBMITBUTTON">SUBMIT</BUTTON></div> 
        </div>
     </div>


     <BR>
     <div >
        <div class="row" >
           <div class="col"><LABEL FOR="TOSS"  STYLE="FONT-SIZE:2.5vw ; POSITION:RELATIVE; LEFT:8vw; VISIBILITY:HIDDEN ;"  ID="TOSSLABEL" >'HEADS'&nbsp; OR &nbsp;'TAILS' :   </LABEL></div>
           <div class="col"><INPUT TYPE="TEXT" class="form-control"  STYLE="BACKGROUND-COLOR:WHITE; FONT-SIZE:2vw; WIDTH:30vw; POSITION:RELATIVE; LEFT:1vw; VISIBILITY:HIDDEN;"  ID="TOSSF"></div> 
           <div class="col"><BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;WIDTH:9.2vw;FONT-SIZE:2vw; VISIBILITY:HIDDEN;" ID="TOSSB">TOSS</BUTTON></div> 
        </div>
     </div>

   
    <BR>
    <LABEL FOR="DISPLAY" STYLE="FONT-SIZE:2.5vw ; POSITION:RELATIVE; LEFT:8vw; VISIBILITY:HIDDEN;" ID="DISPLAY"></LABEL>
    
   
    <BR>
    <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;LEFT:47VW;FONT-SIZE:2vw; VISIBILITY:HIDDEN;"  ID="PLAY1">PLAY</BUTTON>  
   
 
    
    <div class="form-check form-check-inline" >   
          <input class="form-check-input" type="radio" name="DECISION"  value="BATR" checked  STYLE=" POSITION:RELATIVE; LEFT:30VW; VISIBILITY:HIDDEN;"  ID="BATR" >
          <label class="form-check-label" for="BATR" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE; LEFT:30VW; VISIBILITY:HIDDEN ;"  ID="BATRL" >BAT </label>
    </div>

    <div class="form-check form-check-inline" >  
          <input class="form-check-input" type="radio" name="DECISION"  value="BOWLR"  STYLE=" POSITION:RELATIVE; LEFT:37VW;  VISIBILITY:HIDDEN;"  ID="BOWLR" >
          <label class="form-check-label" for="BOWLR" STYLE="FONT-SIZE:2.5vw ; POSITION:RELATIVE; LEFT:37VW; VISIBILITY:HIDDEN ;"  ID="BOWLRL" >BOWL </label>
    </div>
   






    
    <BR>
    <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;LEFT:47VW;FONT-SIZE:2vw; VISIBILITY:HIDDEN;"  ID="PLAY2">PLAY</BUTTON>  
    </div>





    <BR>


    <div STYLE="BACKGROUND-COLOR:WHITE;TOP:20VW; MARGIN:0PX ;WIDTH:80VW;PADDING:0PX;VISIBILITY:hidden;position:absolute;left:10vw; top:2vw;"  ID="FORM1" >

     
       <BR>
        <label class="form-check-label" for="TEAM" STYLE="POSITION:RELATIVE; LEFT:33vw;FONT-SIZE:3vw ;COLOR:#1a8cff ; TEXT-SHADOW:0.2vw 0.2vw #e6e6e6 ; TEXT-ALIGN:CENTER ;"  ID="NAME" >TEAM NAME</LABEL>
       <BR> 



        <label class="form-check-label" for="SCORE1LABEL" STYLE="FONT-SIZE:2.5vw;POSITION:RELATIVE;LEFT:20vw;TOP:2VW;" >SCOREBOARD&nbsp :</LABEL>
        <INPUT TYPE="TEXT" class="form-control"  NAME="S1"  VALUE=0  STYLE="BACKGROUND-COLOR:#e6e6e6; FONT-SIZE:2vw; WIDTH:25vw;POSITION:RELATIVE;LEFT:38vw;TOP:-2VW;"  ID="SCORE1">
       



         <label class="form-check-label" for="WICKET1LABEL" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE;;LEFT:26vw;TOP:1VW;">WICKETS&nbsp :</LABEL>
         <INPUT TYPE="TEXT" class="form-control"  NAME="w1"  VALUE=0  STYLE="BACKGROUND-COLOR:#e6e6e6; FONT-SIZE:2vw; WIDTH:25vw; POSITION:RELATIVE;LEFT:38vw;TOP:-3VW; "  ID="WICKET1">

          
         <label class="form-check-label" for="LABEL" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE;LEFT:8vw;TOP:0VW;">COMPUTER'S PREDICTION:&nbsp</LABEL>
         <label class="form-check-label" for="LABEL" STYLE="FONT-SIZE:2vw ;POSITION:RELATIVE;LEFT:8vw;TOP:0VW;"  ID="COMPUTER" ></LABEL> 
         <BR>
         <label class="form-check-label" for="BAT" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE;LEFT:15.5vw;TOP:2VW;">GUESS A NUMBER&nbsp :</LABEL>
         <INPUT TYPE="TEXT" class="form-control"  NAME="BAT"  VALUE=0  STYLE="BACKGROUND-COLOR:#e6e6e6; FONT-SIZE:2vw; WIDTH:14vw; POSITION:RELATIVE;LEFT:38Vw;TOP:-2VW;"  ID="BATF">
         <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;TOP:-7vw ;LEFT:55vw ;" ID="BATB">BAT</BUTTON>
        
		<label class="form-check-label" for="msg1" STYLE="FONT-SIZE:1.5vw ;POSITION:RELATIVE;TOP:1VW;VISIBILITY:hidden; " ID="MSG1"></LABEL>
         <BR>
		 <BUTTON TYPE="SUBMIT" class="btn btn-primary  BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;LEFT:30VW;VISIBILITY:hidden;" ID="CONT1">CONTINUE</BUTTON>
    </div>






    <div STYLE="BACKGROUND-COLOR:WHITE;TOP:20VW; MARGIN:0PX ;WIDTH:80VW;PADDING:0PX;VISIBILITY:hidden;position:absolute;left:10vw; top:2vw;"  ID="FORM2" >

     
       <BR>
        <label class="form-check-label" for="COMPUTER" STYLE="POSITION:RELATIVE; LEFT:33vw;FONT-SIZE:3vw ;COLOR:#1a8cff ; TEXT-SHADOW:0.2vw 0.2vw #e6e6e6 ; TEXT-ALIGN:CENTER ;"  ID="NAME" >COMPUTER</LABEL>
       <BR> 



        <label class="form-check-label" for="SCORE2LABEL" STYLE="FONT-SIZE:2.5vw;POSITION:RELATIVE;LEFT:20vw;TOP:2VW;" >SCOREBOARD&nbsp :</LABEL>
        <INPUT TYPE="TEXT" class="form-control"  NAME="S2"  VALUE=0  STYLE="BACKGROUND-COLOR:#e6e6e6; FONT-SIZE:2vw; WIDTH:25vw;POSITION:RELATIVE;LEFT:38vw;TOP:-2VW;"  ID="SCORE2">
       



         <label class="form-check-label" for="WICKET2LABEL" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE;;LEFT:26vw;TOP:1VW;">WICKETS&nbsp :</LABEL>
         <INPUT TYPE="TEXT" class="form-control"  NAME="w2"  VALUE=0  STYLE="BACKGROUND-COLOR:#e6e6e6; FONT-SIZE:2vw; WIDTH:25vw; POSITION:RELATIVE;LEFT:38vw;TOP:-3VW; "  ID="WICKET2">

          
         <label class="form-check-label" for="LABEL" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE;LEFT:8vw;TOP:0VW;">COMPUTER'S PREDICTION:&nbsp</LABEL>
         <label class="form-check-label" for="LABEL" STYLE="FONT-SIZE:2vw ;POSITION:RELATIVE;LEFT:8vw;TOP:0VW;"  ID="COMPUTER2" ></LABEL> 
         <BR>
         <label class="form-check-label" for="BOWL" STYLE="FONT-SIZE:2.5vw ;POSITION:RELATIVE;LEFT:15.5vw;TOP:2VW;">GUESS A NUMBER&nbsp :</LABEL>
         <INPUT TYPE="TEXT" class="form-control"  NAME="BOWL"  VALUE=0  STYLE="BACKGROUND-COLOR:#e6e6e6; FONT-SIZE:2vw; WIDTH:14vw; POSITION:RELATIVE;LEFT:38Vw;TOP:-2VW;"  ID="BOWLF">
         <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;TOP:-7vw ;LEFT:53vw ;" ID="BOWLB">BOWL</BUTTON>
        
		<label class="form-check-label" for="msg1" STYLE="FONT-SIZE:1.5vw ;POSITION:RELATIVE;TOP:1VW;visibility:hidden;" ID="MSG2"></LABEL>
        <BR>        
		<BUTTON TYPE="SUBMIT" class="btn btn-primary  BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:RELATIVE ;LEFT:30vw ;visibility:hidden;" ID="CONT2">CONTINUE</BUTTON>
    
    </div>
      
	 <form class="form-inline"   method="post"  > 
     <LABEL FOR="restart" STYLE="FONT-SIZE:2.5vw ; POSITION:ABSOLUTE;LEFT:13VW;TOP:2VW; VISIBILITY:HIDDEN;" ID="RESL">Press "RESTART GAME"  button below to enjoy the game again.</LABEL>
     <BUTTON TYPE="SUBMIT" class="btn btn-primary mb-2 BUTTON"  STYLE="BACKGROUND-COLOR:#595959;POSITION:ABSOLUTE ;TOP:7vw ;LEFT:40vw ; VISIBILITY:HIDDEN;"     ID="RESTART" name="RESTART"  form="myform">RESTART&nbsp; GAME</BUTTON>
    

     <BR>
      </form>
  


   





  </div>

















<script type="text/javascript">

       document.getElementById("START").onclick = function() 
               { 
                 document.getElementById("TEAMNAME").style.visibility="visible";
                 document.getElementById("NAMEFIELD").style.visibility="visible";
                 document.getElementById("SUBMITBUTTON").style.visibility="visible";
               }
  



   var team;
   
   var l=0,w=0;
   
      document.getElementById("SUBMITBUTTON").onclick = function() 
             { 

                  var name=document.getElementById("NAMEFIELD").value.toUpperCase();
                      team=name;
               if(name=="")
                   alert("ENTER TEAM NAME");
              
              else    
                { document.getElementById("TOSSLABEL").style.visibility="visible";
                 document.getElementById("TOSSF").style.visibility="visible";
                 document.getElementById("TOSSB").style.visibility="visible";
               
               }   
           }


     
      var Batorball = Math.floor(Math.random() * 2 ) + 1;



      document.getElementById("TOSSB").onclick = function() 
              {   
                 
                  document.getElementById("DISPLAY").style.visibility="visible";
               
                  var TOSS= document.getElementById("TOSSF").value.toUpperCase();
                     
                  var num = Math.floor(Math.random() * 2 ) + 1;

                  



                  if(TOSS=="") 
                      document.getElementById("DISPLAY").innerHTML="Make your decision to proceed.";

                  else  if(TOSS=="HEADS" && num=="1" || TOSS=="TAILS" && num=="2")
                  {   
                       document.getElementById("DISPLAY").innerHTML="Congratulations! You have won the toss . Choose 'BAT' OR 'BOWL'"; 
                       document.getElementById("BATR").style.visibility="visible"; 
                       document.getElementById("BOWLR").style.visibility="visible"; 
                       document.getElementById("BATRL").style.visibility="visible"; 
                       document.getElementById("BOWLRL").style.visibility="visible"; 
                       document.getElementById("PLAY2").style.visibility="visible";                                     
                                
                   }
                  
                  else if(TOSS=="TAILS" && num=="1" || TOSS=="HEADS" && num=="2")   
                     {   
                         if(Batorball==1)
                         document.getElementById("DISPLAY").innerHTML="Sorry. You have lost the toss. Computer has elected to bat first.";

                       else
                          document.getElementById("DISPLAY").innerHTML="Sorry. You have lost the toss. Computer has elected to bowl first.";
                     
                          document.getElementById("PLAY1").style.visibility="visible"; 
                       } 

                 else
                    document.getElementById("DISPLAY").innerHTML="Invalid entry";

             }




      document.getElementById("PLAY1").onclick = function() 
                 {
                 document.getElementById("START").style.visibility="hidden"; 
                 document.getElementById("TEAMNAME").style.visibility="hidden";
                 document.getElementById("NAMEFIELD").style.visibility="hidden";
                 document.getElementById("SUBMITBUTTON").style.visibility="hidden";
                 document.getElementById("TOSSLABEL").style.visibility="hidden";
                 document.getElementById("TOSSF").style.visibility="hidden";
                 document.getElementById("TOSSB").style.visibility="hidden";
                 document.getElementById("DISPLAY").style.visibility="hidden";
                 document.getElementById("PLAY1").style.visibility="hidden";


                 if(Batorball==1)
                      document.getElementById("FORM2").style.visibility="visible";
                 
                 else  
                     {document.getElementById("FORM1").style.visibility="visible";
                     document.getElementById("NAME").innerHTML=team; 
                      } 
             
                  }



       document.getElementById("PLAY2").onclick = function() 
                 {
                 document.getElementById("TEAMNAME").style.visibility="hidden";
                 document.getElementById("NAMEFIELD").style.visibility="hidden";
                 document.getElementById("SUBMITBUTTON").style.visibility="hidden";
                 document.getElementById("TOSSLABEL").style.visibility="hidden";
                 document.getElementById("TOSSF").style.visibility="hidden";
                 document.getElementById("TOSSB").style.visibility="hidden";
                 document.getElementById("DISPLAY").style.visibility="hidden";
                 document.getElementById("PLAY2").style.visibility="hidden";
                 document.getElementById("START").style.visibility="hidden"; 
                 document.getElementById("BATR").style.visibility="hidden"; 
                 document.getElementById("BOWLR").style.visibility="hidden"; 
                 document.getElementById("BATRL").style.visibility="hidden"; 
                 document.getElementById("BOWLRL").style.visibility="hidden"; 

         if(document.getElementById("BATR").checked)
                     { document.getElementById("FORM1").style.visibility="visible";
                       document.getElementById("NAME").innerHTML=team; 
                     }
              
                 else  if(document.getElementById("BOWLR").checked)
                     document.getElementById("FORM2").style.visibility="visible";
                     
                 }

var score=0;




document.getElementById("BATB").onclick = function() 
 { 
                 

                  var COMP = Math.random();
                      COMP= COMP*6+1;
                      COMP = Math.floor(COMP);
                               
                             var B= parseInt(document.getElementById('BATF').value);
                             var W= parseInt(document.getElementById('WICKET1').value);
                             var S= parseInt(document.getElementById('SCORE1').value);
                             var wins=parseInt(document.getElementById('wins').value);
                             var loss=parseInt(document.getElementById('loss').value);
							 w=wins;
							 l=loss;
                   							 
              


    if(B>=1 && B<=6)        
     {
                 
 
                       
           if(score==0)
            { 
                       if(COMP==B)
                                 {
                                    W=W+1;
                                   
                                       if(W==3)                      
                                       {
                                           score=S;
										   document.getElementById("COMPUTER").innerHTML=COMP;  
                                           document.getElementById('WICKET1').value=W;
                                           document.getElementById("MSG1").style.visibility="visible";
									       document.getElementById("CONT1").style.visibility="visible";
										   document.getElementById("MSG1").innerHTML="You have scored "+S+" runs. Computer needs " + (S+1) + " runs to win. ";
      
                                           
										    document.getElementById("CONT1").onclick = function() 
										   {
                                            document.getElementById("FORM1").style.visibility="hidden";
                                            document.getElementById("FORM2").style.visibility="visible";
											document.getElementById("MSG1").style.visibility="hidden";
									        document.getElementById("CONT1").style.visibility="hidden";											
										
                                           }
                                        }
                                  }       
                               else
                                 S=S+B;

                                document.getElementById("COMPUTER").innerHTML=COMP;  
                                document.getElementById('WICKET1').value=W;
                                document.getElementById('SCORE1').value=S;
             }



       
           else
             {                      
                 if(S<score && W<3 )
                           {
                                       if(COMP==B)
                                        {   
                                              W=W+1;
                                                if(W==3)                      
                                                 {  
												    loss=loss+1	;
													l=loss;
													document.getElementById("MSG1").style.visibility="visible";
													document.getElementById("CONT1").style.visibility="visible";
													document.getElementById("MSG1").innerHTML="Sorry. You have lost the match by "+(score-S)+"runs. BETTER LUCK NEXT TIME.";
                                                    document.getElementById("loss").value=loss; 
                                                    document.getElementById("COMPUTER").innerHTML=COMP;													
                                                    document.getElementById('WICKET1').value=W;
                                                    
										
													
													document.getElementById("CONT1").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG1").style.visibility="hidden";
									                document.getElementById("CONT1").style.visibility="hidden";
                                                    }
                                                    
                                                 }
                                        }  
                                      else
                                         S=S+B;       
                     
                                  
                                           if(S>score) 
                                              {
												 
											   wins=wins+1;  
											   w=wins;
                                               document.getElementById("COMPUTER").innerHTML=COMP;  
                                               document.getElementById('WICKET1').value=W;
                                               document.getElementById('SCORE1').value=S;
											   document.getElementById("MSG1").style.visibility="visible";
											   document.getElementById("CONT1").style.visibility="visible";
											   document.getElementById("MSG1").innerHTML="Congratulations! You have won the match by "+ (3-W) + " wickets.";
                                               document.getElementById("wins").value=wins; 

													                                               
											   
											      document.getElementById("CONT1").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG1").style.visibility="hidden";
									                document.getElementById("CONT1").style.visibility="hidden";													
                                                    }
                                              }


                                          else                                           
                                           {
                                                document.getElementById("COMPUTER").innerHTML=COMP;  
                                                document.getElementById('WICKET1').value=W;
                                                document.getElementById('SCORE1').value=S;
                                           }
                                           
                           }

                  else if(S==score && W<3)
                       {      
                                
                                  if(COMP==B)
                                    {   
                                              W=W+1;
                                                if(W==3)                      
                                                 {  
												    
                                                    document.getElementById("COMPUTER").innerHTML=COMP;  
                                                    document.getElementById('WICKET1').value=W;
											        document.getElementById("MSG1").style.visibility="visible";
											        document.getElementById("CONT1").style.visibility="visible";
											        document.getElementById("MSG1").innerHTML="The match is draw.";
 													
  													
													document.getElementById("CONT1").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG1").style.visibility="hidden";
									                document.getElementById("CONT1").style.visibility="hidden";													
                                                    }

                                                  
                                                 }    
                                            document.getElementById("COMPUTER").innerHTML=COMP;  
                                            document.getElementById('WICKET1').value=W;
                                   }


       
  
                                 else
                                   {             
                                             	 
												  wins=wins+1; 
												  w=wins;
                                                  document.getElementById("COMPUTER").innerHTML=COMP;  
                                                  document.getElementById('SCORE1').value=S;
                                                  document.getElementById("wins").value=wins; 
												  document.getElementById("MSG1").style.visibility="visible";
											      document.getElementById("CONT1").style.visibility="visible";
											      document.getElementById("MSG1").innerHTML="Congratulations! You have won the match by "+ (3-W) + " wickets.";
										   												  
													  
													
												  document.getElementById("CONT1").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG1").style.visibility="hidden";
									                document.getElementById("CONT1").style.visibility="hidden";													
                                                    }
                                                  
                                   } 
    
                       }
                
           }
    }     
              else
                 alert("GUESS A NUMBER BETWEEN 1 AND 6 (INCLUDING 1 AND 6). ");          
        
  }  

       















  document.getElementById("BOWLB").onclick = function() 
  { 
                 

                  var COMP = Math.random();
                      COMP= COMP*6+1;
                      COMP = Math.floor(COMP);
                               
                             var B= parseInt(document.getElementById('BOWLF').value);
                             var W= parseInt(document.getElementById('WICKET2').value);
                             var S= parseInt(document.getElementById('SCORE2').value);
                             var wins=parseInt(document.getElementById('wins').value);
                             var loss=parseInt(document.getElementById('loss').value);
							 w=wins;
							 l=loss;
                   
                 
    if(B>=1 && B<=6)        
     {
                 
 
                       
          if(score==0)
                { 
                         if(COMP==B)
                                 {
                                    W=W+1;
                                   
                                       if(W==3)                      
                                       {
										   score=S;		
                                           document.getElementById('WICKET2').value=W;
                                           document.getElementById("COMPUTER2").innerHTML=COMP;  
										   document.getElementById("MSG2").style.visibility="visible";
                                           document.getElementById("CONT2").style.visibility="visible";
										   document.getElementById("MSG2").innerHTML="Computer has scored "+S+" runs. You need " + (S+1) + " runs to win. ";
                                           										

										   document.getElementById("CONT2").onclick = function() 
													{
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("FORM1").style.visibility="visible";
													document.getElementById("MSG2").style.visibility="hidden";
									                document.getElementById("CONT2").style.visibility="hidden";													
                                                    }
										   
                                           
                                       }
                                }       
                        else
                             S=S+COMP;

                                document.getElementById("COMPUTER2").innerHTML=COMP;  
                                document.getElementById('WICKET2').value=W;
                                document.getElementById('SCORE2').value=S;
                          }


           else
             {                      
                 if(S<score && W<3 )
                           {
                                       if(COMP==B)
                                        {   
                                              W=W+1;
                                                if(W==3)                      
                                                 {  
											
												    wins=wins+1; 
													w=wins;
                                                    document.getElementById("COMPUTER2").innerHTML=COMP;  
                                                    document.getElementById('WICKET2').value=W;
                                                    document.getElementById("wins").value=wins;													
	                                                document.getElementById("MSG2").style.visibility="visible";
                                                    document.getElementById("CONT2").style.visibility="visible"	;
													document.getElementById("MSG2").innerHTML="Congratulations! You have won the match by "+ (score-S) + " runs.";
										   
										   													
																							
												   document.getElementById("CONT2").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG2").style.visibility="hidden";
									                document.getElementById("CONT2").style.visibility="hidden";													
                                                    }
                                                    
                                                 }
                                        }  
                                      else
                                         S=S+COMP;       
                     
                                  
                                           if(S>score) 
                                              {
												  

											   loss=loss+1	;	
											   l=loss;
                                               document.getElementById("COMPUTER2").innerHTML=COMP;  
                                               document.getElementById('WICKET2').value=W;
                                               document.getElementById('SCORE2').value=S;                                             
                                               document.getElementById("loss").value=loss; 
                                               document.getElementById("MSG2").style.visibility="visible";
                                               document.getElementById("CONT2").style.visibility="visible";													
											   document.getElementById("MSG2").innerHTML="Sorry. You have lost the match by "+(3-W)+"wickets. BETTER LUCK NEXT TIME."; 
		
													
											   document.getElementById("CONT2").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG2").style.visibility="hidden";
									                document.getElementById("CONT2").style.visibility="hidden";													
                                                    }	   
                                               
                                              }


                                          else                                           
                                           {    
                                                document.getElementById("COMPUTER2").innerHTML=COMP;  
                                                document.getElementById('WICKET2').value=W;
                                                document.getElementById('SCORE2').value=S;
                                           }
                                           
                           }

              else if(S==score && W<3)
                       {      
                                
                                  if(COMP==B)
                                    {   
                                              W=W+1;
                                                if(W==3)                      
                                                 {  
                                                    document.getElementById("COMPUTER2").innerHTML=COMP;  
                                                    document.getElementById('WICKET2').value=W;
                                                    document.getElementById("MSG2").style.visibility="visible";
                                                    document.getElementById("CONT2").style.visibility="visible";													
											        document.getElementById("MSG2").innerHTML="The match is draw."; 
											   
											        document.getElementById("CONT2").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG2").style.visibility="hidden";
									                document.getElementById("CONT2").style.visibility="hidden";													
                                                    };

                                                    
                                                 } 
                                            document.getElementById("COMPUTER2").innerHTML=COMP;    
                                            document.getElementById('WICKET2').value=W;   
                                  } 
                                 else
                                   {              
											   
											   loss=loss+1	;	
											   l=loss;
                                               document.getElementById("COMPUTER2").innerHTML=COMP;  
                                               document.getElementById('WICKET2').value=W;
                                               document.getElementById('SCORE2').value=S;                                             
                                               document.getElementById("loss").value=loss; 
                                               document.getElementById("MSG2").style.visibility="visible";
                                               document.getElementById("CONT2").style.visibility="visible";													
											   document.getElementById("MSG2").innerHTML="Sorry. You have lost the match by "+(3-W)+"wickets. BETTER LUCK NEXT TIME."; 

													
													
											   document.getElementById("CONT2").onclick = function() 
													{
                                                    document.getElementById("FORM1").style.visibility="hidden";
                                                    document.getElementById("FORM2").style.visibility="hidden";
                                                    document.getElementById("RESTART").style.visibility="visible";
                                                    document.getElementById("RESL").style.visibility="visible";
													document.getElementById("MSG2").style.visibility="hidden";
									                document.getElementById("CONT2").style.visibility="hidden";													
                                                    }	   
                                               
                                   } 
    
                       }
            
    
             }
    }
                  else
                    alert("GUESS A NUMBER BETWEEN 1 AND 6 (INCLUDING 1 AND 6). ");          
        
            
   
 } 
         



	

</script>

</body>

</html>