<html>
    <title>LOG IN</title>     
    
    <head>
   
        <?php
            session_start();
            include "config.php"  
        ?>
        <?php
            include "head.php"
        ?>
        <!-- sript for validation-->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // email validation
                $("#email").focusout(function(){
                    inputemail = $("#email").val();
                    inputemailPattern = /^[^0-9]+[a-z0-9]+(@)[a-z]+\.(edu|com|org)$/;
                    if (inputemailPattern.test(inputemail)) {
                        $(".emailmessage").html("valid email").css("color", "white");
                    }
                    else {
                        $(".emailmessage").html("Please Enter Valid Email").css("color", "red");
                    }
                });
            });
        </script>
    </head>
    
    <body class="hero" bgcolor="">

    <div class="head">
    <header class="header">
        <br>
        <span class="topbar">
            <!--<span class="Plogo"><img src="./imgs/P-logo.jpg"><p class="Plogo img title">Smart Parking</p></span>-->
            <span class="menu"><a href="index.php"> Home </a></span>
            <span class="menu"><a href="about.php"> About </a></span>
        </span>
     
        <span class="socialmedia">
            <span>
            <class="socialmedia-top" title="Account"><a href="signup.php"> <i class="bi bi-people-fill"></i></a>
            </span>

            <span>
            <class="socialmedia-top" title="Facebook"><a href=""><i class="bi bi-facebook"></i></a>
            </span>
            
            
            <span>
            <class="socialmedia-top" title="Youtube"><a href=""><i class="bi bi-youtube"></i> </a>
            </span> 
            
            <span>
            <class="socialmedia-top" title="Instagram"><a href=""><i class="bi bi-instagram"></i></a>
            </span>
        </span>
        </header>
    
    <nav class="nav">
        <span class="Plogo"><img src="./images/Parking_logo.jpg"><p class="Plogo img title">Smart Parking</p></span>
    </nav>
    </div>
  
   
    <body>

    
        <!--form style--->
        <style>
            
            .form_login{
                margin-top: 80px;
            }
            .signup_form{
                margin-left: 450px;
                font-size: 10px;
                margin-bottom: 200px;
                margin-top: 50px;
            }
            .signup_title{
                margin-top: 10px;
                text-align: center;
                font-size: 20px;
                color: #413f3f;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                background-color: white;
                width: 200px;
                height: 50px;
                margin-left: 465px;
                border-radius: 10px;
            }
            .signup_title .bi{
                font-size: 25px;
                color: cornflowerblue;
            
            }
        
            .signup_input{
                padding: 15px;
                width: 450px;
                border-radius: 5px;
                border-color: black;
            }
            .signup_btn{
                width: 10%;
                background-color: cornflowerblue;
                border-radius: 5px;
                color: #fff;
                font-size: 16px;
                height:45px ;
                margin-left: 5px;
            }
            .signup_btn:hover{
                background-color:deepskyblue;
                cursor: pointer;
            }
            .signup_clear_btn{
                height:45px ;
                width: 10%;
                margin-left: 16px;
                border-radius: 5px;
                color: black;
                font-size: 16px;
                background-color: white;
                border: none;
            }
            .signup_clear_btn:hover{
                cursor:pointer;
                background-color:dimgrey;
            }
            .signup_msg{
                color:black;
            }
            .personal{
                width: 350px;
                height: 40px;
                padding-left: 3px;
                color: black;
                margin: 15px;
            }
            .personal:hover{
                border-color: red;
            }
            .namemessage{
                font-size: 12px;
            }
            .phonemessage{
                font-size: 12px;
            }
            .emailmessage{
                    font-size: 12px;
                    margin-top: -10px;
                    font-style:bold;
                    margin-left: 10px;
            }
            .vehicle_no_message{
                font-size: 12px;
            }
            .echo{
                padding-left: 450px;
                color: black;
            }
            .Plogo img{
                width: 75px;
                margin-left: 50px;
              
            }
            .Plogo p{
                margin-left: 50px;
                color: #fff;
             
            }
            .signuplink{
                margin-left: 470px;
            
            }
            .signuplink a{
                text-decoration: none;
            }
            .signuplink a:hover{
                color: red;
                text-decoration: underline;
            }
            .forgotlink{
                margin-left: 200px;
                text-decoration: none;
            }
            .forgotlink:hover{
                color: red;
                text-decoration: underline;
            }
            h6{
                font-size: 12px;
                margin-left: 15px;
            }
            .message{
                margin-left: 200px;
                font-size: 14px;
            }
            .sub_message{
                margin-left: 200px;
                font-size: 14px;
                color: red;

            }

        </style>
     <!--User login form validation-->
     <?php
            if(isset($_POST['submit']))
            {
                $email = $_POST ["email"];
                $user_password =$_POST['u_password'];
                
                if($user_password!=="" &&!$email!=="")
                {
                    $sql = "SELECT id,email,user_password FROM signup WHERE email='$email' AND user_password='$user_password'";
                    $result=$con->query($sql);
                    //print_r($result);
                    
                    if($result->num_rows==1)
                    
                    {
                        //header('Location: search_bar.php');
                        echo "<script>window.location.href='search_bar.php';</script>";
                    }
                    
                    else
                    
                    {
                        echo " <p class='sub_message'><b>INVALID USER</b></p>";
                    }
                    
                    //echo " <p class='message'>PLEASE ENTER THE ALL THE VALE</p>";
                }
                
                else
                
                {
                    //header('Location: login.php');
                    echo "<script>window.location.href='login.php';</script>";
                    // echo  " All field requiired....!";
                    echo " <p class='sub_message'><b>FAILED TRY AGAIN....! </b></p>";
                }
            }
            
            else
            {
                //echo "<p class='signup_msg'>Please enter all value</p>";
                echo " <p class='message'>PLEASE FILL THE DETAILS TO COMPLETE ACCESS</p>";
            }
        ?>

        <!--Admin login form validation-->
        <?php
            if(isset($_POST['submit']))
            {
                $email = $_POST ["email"];
                $user_password =$_POST['u_password'];
                
                if($user_password!=="" &&!$email!=="")
                {
                    $sql = "SELECT id,email,user_password FROM admin WHERE email='$email' AND user_password='$user_password'";
                    $result=$con->query($sql);
                    //print_r($result);
                    
                    if($result->num_rows==1)
                    
                    {
                        //header('Location: search_bar.php');
                        echo "<script>window.location.href='admin.php';</script>";
                    }
                    
                    else
                    
                    {
                        echo " <p class='message'></p>";
                    }
                    
                    echo " <p class='message'></p>";
                }
                
                else
                
                {
                    //header('Location: login.php');
                    echo "<script>window.location.href='login.php';</script>";
                    // echo  " All field requiired....!";
                    echo " <p class='message'></p>";
                }
            }
            
            else
            {
                //echo "<p class='signup_msg'>Please enter all value</p>";
                echo " <p class='message'></p>";
            }
        ?>
    </body>
    

        <!--Login form function-->

        <div class="form_login">
            <h5 class="signuplink">Don't have an account yet?<a href="signup.php"> Sign up.</a></h5> 
            <button class="signup_title">Login Here <i class="bi bi-hand-thumbs-up-fill"></i></button>
            <br>
            <form action="login.php" method="post"  autocomplete="off" class="signup_form">
                <!-- <input type="text" id="name" name="u_name"placeholder="Name" class="personal" required>
                <p class="namemessage"></p>
                <br>-->
                <h6>Email adress<span class='emailmessage'></span></h6>
                <input type="email" name="email" for="e-mail"  placeholder="Enter Email"size="30%" class="personal"  id="email" required>
               
                <!--pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"-->
                <!-- <br><br>
                <input type='text' name ="phone_no"placeholder='Phone No' class='personal'required id="phone"><p class="phonemessage"></p>
                <br>-->

                <label class="signup_lable_password"></label>
                
                <h6>Password<a href="" class="forgotlink"> Forgot password?</a></h6>
                <input type="password" name="u_password" for="password" placeholder="Enter Password" size="40%" class="personal" required>
                <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one upper case and lower case letter, and at least 8 0r more characters"-->
              
                <!--<label class="signup_lable_password"></label><br>
                <input type="password" name="conform_password" for="password" placeholder="conform password" size="40%" class="personal"  required>
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one upper case and lower case letter, and at least 6 0r more characters"-->
                <br>
                <button class="signup_clear_btn" type="reset" value="submit">Clear</button>
                
                <button class="signup_btn"type="submit" name ="submit" value="submit">LOG IN</button>
                
            </form>
        </div>

    
   
    <!--Footer--->
    <section class="copyright">
        <br><br><br><br>
        <table width=100%>
            <p class="note">“Creating a better future Requires creativity in the present.”</p>
            <br><br>
            <p class="number"> | Hotline: 0775063579 | </p>
            <br><br><br><br><br><bR>
            
            <tr>
                <th>CUSTOMER SERVICE</th>
                <th>MORE INFORMARION</th>
                <th>PAYMENT METHOD</th>
                <th>SOCIAL MEDIA</th>
            </tr>
            
            <tr align="center">
                <td>
                    <br>
                    Vedio gallary<br>
                    <a href="login.php">Login</a>
                </td>
                
                <td>
                    <br>
                    About us<br>
                    Contect us
                </td>
                
                <td>
                    Cashon delivery
                </td>
                
                <td>
                    <span class="socialmedia_foot">
                        <span>
                            <class="facebook" title="Facebook"><a href=""><i class="bi bi-facebook" ></i></a>
                        </span>
                        
                        <span>
                            <class="Instagram" title="Youtube"><a href=""><i class="bi bi-youtube"></i> </a>
                        </span> 
                        
                        <span>
                            <class="Youtube" title="Instagram"><a href=""><i class="bi bi-instagram" aria-hidden="true"></i></a>
                        </span> 
                        
                        <span>
                            <class="Whatsapp" title="Whatsapp"><a href="">  <i class="bi bi-whatsapp"></i></a>
                        </span>
                        
                        <span>
                            <class="Whatsapp" title="Twitter"><a href=""> <i class="bi bi-twitter"></i></a>
                        </span>
                    </span>
                </td>
            </tr>
        </table>
        <br><br><br><br><br><br>
        <div class="text">
            <h5> Johnson B.L bug free Pvt (Ltd). © 2023. All Rights Reserved</h5>
        </div>
    </section>

</html>