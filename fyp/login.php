<?php
    
    $emptyfield=null;
    $invalidusername=null;
    $invalidemail=null;
    $usernametaken=null;
    $stmtfailed=null;
    $invalidpw=null;
    $invalidusn=null;
    $invalidpassword=null;
    $loginemptyfield=null;
    $invpw=null;
    $invalidconpw=null;
    $emailexist=null;

            if(isset($_GET["error"]))
            {
            if($_GET["error"]=="emptyinput")
            {
                $emptyfield="PLEASE FILL UP ALL THE SECTIONS"; 
            }
            else if ($_GET["error"]=="invalidusername")
            {
                $invalidusername="THE USERNAME IS INVALID";
            }
            else if ($_GET["error"]=="invalidemail")
            {
                $invalidemail="THE EMAIL IS INVALID";
            }
            else if ($_GET["error"]=="passwordnotmatch")
            {
               $invalidpw="PLEASE ENTER THE SAME PASSWORD";
            }
            else if ($_GET["error"]=="usernametaken")
            {
                $usernametaken="THE USERNAME IS ALREADY VALID";
            }
            else if ($_GET["error"]=="stmtfailed")
            {
                $stmtfailed="PLEASE TRY AGAIN";
            }
            else if ($_GET["error"]=="usernamedoesnotexist")
            {
                $invalidusn="INCORRECT USERNAME";
            }
            else if ($_GET["error"]=="passwordincorrect")
            {
                $invalidpassword="INCORRECT PASSWORD";
            }
            if($_GET["error"]=="loginemptyinput")
            {
                $loginemptyfield="PLEASE FILL UP YOUR USERNAME AND PASSWORD";
            }

            if($_GET["error"]=="invalidpassword")
            {
                $invpw="At least 6 charts, 1 uppercase, 1 number, 1 symbol.";
            }
            if($_GET["error"]=="emailtaken")
            {
                $emailexist="THE EMAIL IS ALREADY TAKEN";
            }
            
            }
?>

<!DOCTYPE html>
<html>
<head>

    <title></title>
    <style>

        .box{
            border-radius: 5px;
            width:330px;
            height:570px;
            position: absolute;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            background-color: pink;
            padding: 5px;
            overflow:hidden;
         
        
        }

        .buttonbox{
            width:210px;
            margin: 30px auto;
            position: relative;
            border-radius: 30px;
            border-left:0;
            border-right:0;
            border-top:0;
            border-bottom: 0;
            
        }
        .empty_msg{
            color:red;
            font-size: 12px;
            padding-left:90px;
        }
        .err_msg{
            color:red;
            font-size: 12px;
            padding-left:10px;
        }

        .toggle-btn{
            color: black;
            background-color:pink;
            padding: 10px;
            border: 0;
            outline: none;
            position: relative;
            
    
        }

        #btn{
            top:0;
            left:0;
            position: absolute;
            width: 90px;
            height:100%;
            border-left:0;
            border-right:0;
            border-top:0;
            border-bottom: 1px solid rgb(137, 211, 236);
            border-width: 5px;
            transition: .5s;
            

    
        }

        .icon{
            margin: 350px auto;
            text-align: center; 
        }
        .icon img{
            width:30px;
            margin: 0 12px;
            box-shadow: 0 0 20px 0 #7f7f7f3d;
            cursor: pointer;
            border-radius: 30%;
        }

.input-group{
    padding-top:15px;
    top: 90px;
    position: absolute;
    width:280px;
    transition: .5s;
    
}
.input-field{
    width: 100%;
    padding:10px;
    margin: 5px;
    border-left:0;
    border-right:0;
    border-top:0;
    border-bottom: 2px solid #999;
    outline: none;
    background: transparent;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    
}
.input-field:focus{
    border-bottom:2px solid lightskyblue;    
    box-shadow: 0px 2px 2px lightskyblue;
   
}
input:focus::placeholder{
    color:black;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    
}
.submit-btn{
    width: 85%;
    padding: 10px;
    cursor: pointer;
    display: block;
    margin: auto;
    background: white;
    border: 0;
    outline: 0;
    border-radius: 30px;
   
}


.check-box{
    margin: 30px 10px 30px 10px; 
}
span.checkb{
    color:black;
    font-size: 12px;
    bottom: 70px;
}
#login{
    left: 15px;
}
#signup{
    left: 400px;
}
body{
    margin:0px ;
}
div.btnsubmit{
    padding-left: 20px;
    
}
span.fgpw{
    color:black;
    font-size: 12px;
    padding-left: 10px;
}
div.alignfgpw{
    text-align: center;
}
a:link { 
    text-decoration: none; 
}
a:visited { 
    text-decoration: none; 
}

a:active { 
    text-decoration: none; 
}

span.fgpw {
  position: relative;
}

span.fgpw::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 1.5px;
    
    
    background-color: black;
    bottom: 0;
    left: 0;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .3s ease-in-out;
    
  }

span.fgpw:hover::before {
  transform-origin: left;
  transform: scaleX(1);
  
}

.show{
    
    font-size:15px;
}

.keep{

    font-size:15px;
}

    </style>
    
</head>
<body>

    

    <div class="box">
        <div class="buttonbox">
           <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()" style="font-weight:bold; font-size:20px;" id="lb">Log In</button>
            <button type="button" class="toggle-btn" onclick="signup()"  style="font-weight:bold; font-size:20px;" id="sb">&nbsp;Sign Up</button>
            
        </div>
        
        <form id="login" class="input-group" action="login.func.php" method="POST" autocomplete="off">
            <br>
            <input type="text" class="input-field" placeholder="Username" name="username">
            <span class="err_msg">
                <?php echo $invalidusn; ?>
            </span>
            
            <input type="password" class="input-field" placeholder="Password" name="password" id="p">

            <input type="checkbox" onclick="loginshowpw()"><span class="show">Show Password</span>
           
            <script>
                function loginshowpw() {
                var x = document.getElementById("p");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
                }
            </script>
            <br>
            <input type="checkbox" onclick="keepsign()"><span class="keep">Keep me signed in</span>


            <br><br>
             <span class="err_msg">
                <?php echo $invalidpassword; ?><br>
            </span>
           
            <span class="empty_msg">
                <?php echo $loginemptyfield; ?>
            </span> 

            <div class="btnsubmit" style="padding-top:20px;">
            <button type="submit" class="submit-btn" name="loginbtn">Log In</button>
            
            </div>
            <div class="alignfgpw">
                <br>
            <a href="forgot.php"><span class="fgpw">forgot password?</span></a>
            </div>
        </form>

        
        <form id="signup" class="input-group" method="post" name="signupfrm" action="signup.func.php" autocomplete="off">

            <input type="text" class="input-field" placeholder="Full Name" name="fullname">

            <input type="tel" class="input-field" placeholder="Phone Number" name="contactno">

            <input type="email" class="input-field" placeholder="Email" name="email">
            <span class="err_msg">
                <?php echo $invalidemail; ?>
            </span>
            <span class="err_msg">
                <?php echo $emailexist; ?>
            </span>
            <input type="text" class="input-field" placeholder="User Name" name="username">
            <span class="err_msg">
                <?php echo $invalidusername; ?>
            </span>
            <span class="err_msg">
                <?php echo $usernametaken; ?>
            </span>
            <input type="password" class="input-field" placeholder="Password" name="userpassword" id="pw">
            <br>
            
            <input type="checkbox" onclick="signshowpw()"><span class="showpw">Show Password</span>

            <script>
                function signshowpw() {
                var x = document.getElementById("pw");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
                }
            </script>
            
            <div class="err_msg">
                <?php 
                if($invpw!=null)
                {
                    echo "<br>"; 
                    echo $invpw; 
                }
                    
                ?>
            </div>
            
            <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="conpw">
            <input type="checkbox" onclick="signshowconpw()"><span class="showpw">Show Password</span>

            <script>
                function signshowconpw() {
                var x = document.getElementById("conpw");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
                }
            </script>
            
            <br>        
            <span class="err_msg">
                <?php echo $invalidpw; ?>
            </span>

            <br>
            <span class="empty_msg">
                <?php echo $emptyfield; ?>
            </span>  
            <div class="btnsubmit" style="padding-top:20px;">
                <input class="submit-btn" type="submit" name="signupbtn" value="Sign Up">
            </div>
            
        </form>
        <div>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("btn");

        function signup(){
            x.style.left="-400px";
            y.style.left="15px";
            z.style.left="110px";
        }
        function login(){
            x.style.left="15px";
            y.style.left="400px";
            z.style.left="0";
        }
        
    </script>
    
</body>
</html>
