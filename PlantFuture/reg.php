<!doctype html>
<html>
    <head>
        <!-- bootstrap links, meta contents and references -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- external css link -->
        <link rel="stylesheet" href="stylereg.css" />
        <!-- title shows in the browser bar -->
        <title>Plant Future</title>
        
        <!-- javascript alert, email verification codes -->
        <script type="text/javascript">
            function about () {
				alert("Still not available, Please Contact with MASUD!");
				}
            function readmore () {
				alert("We are not ready yet, still working on it.");
				}
            function cpyr8 () {
				alert("Author - Shaikh Nazmul Islam Masud, nazmul35-125@diu.edu.bd, 0152 149 6032, Mohammadpur, Dhaka-1207");
				alert("Copyright or any change not allowed");
				alert("We don't sell your information");
				}
            function checkEmail() {
                var email = document.getElementById('txtEmail');
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                
                if (!filter.test(email.Value)) {
                    alert ('Please provide a valid email address! vul email dicis!');
                    email.focus;
                    return false;
                }
            }
            function checkName() {
                var name = document.getElementById('txtName');
                var filter = /^([a-zA-Z])+$/;
                
                if (!filter.test(name.value)) {
                    alert('Please provide a valid Name');
                    name.focus;
                    return false;
                }
            }
        </script>
    </head>
    
    <body>
        <!-- header file for logo, sign in, sign up option etc -->
        <header>
            <div>
                <!-- this div about logo -->
                <div class="header1">
                    <h1>Plant Future</h1>
                </div>
                <!-- this div is for sign in, sign up -->
                <div class="header2">
                    <div>
                        <form id="F12" method="POST">
                            <input for="email" type='text' name="email" id='txtEmail' placeholder="email" required />
                            <input for="psw" type="password" name="psw" placeholder="password" required />
                            
                            <button name="login" class="lbtn btn-dark" type="submit">Sign In</button>
                        </form>
                    </div>
                    <div id="F13">
                        <a href="index.php"><button class="btn btn-dark my-sm-0">Back</button></a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- this is menu div -->
        <nav>
            <div id="menu">
                <ul>
                    <a href="reg.php"><li>Menu</li></a>
                    <a href="reg.php"><li>Item</li></a>
                    <a href="reg.php"><li>Item</li></a>
                    <a href="reg.php"><li>Item</li></a>
                    <a href="reg.php"><li>Item</li></a>
                    <a href="reg.php"><li>Item</li></a>
                    <a href="reg.php"><li>Item</li></a>
                    <a href="reg.php" onclick="about ()"><li>About</li></a>
                </ul>
            </div>
        </nav>
        
        <!-- main body, contains reg form -->
        <div id="b11">
            <div>
                <!-- Registration Form-->
                <div>

                  <form method="POST">
                    <div class="container">
                      <label for="name"><b>Full Name:</b></label><br>
                        <input type='text' placeholder="Enter Name" name="name" id='txtName' required><br>

                      <label for="email"><b>email:</b></label><br>
                      <input type='text' placeholder="Enter email" name="email" id='txtEmail' required /><br>

                      <label for="uname"><b>Username:</b></label><br>
                      <input type="text" placeholder="Enter Username" name="uname" required><br>

                      <label for="psw"><b>Password:</b></label><br>
                      <input type="password" placeholder="Enter Password" name="psw" required><br><br>

                      <button class="btn btn-dark" style="float: left;" name="register" type="submit">Sign up</button>
                        
                    </div>

                    <div class="container" >
                      <a href="index.php"><button type="button" class="cancelbtn btn btn-dark" style="margin-left: 20px;">Cancel</button></a>
                    </div>
                  </form>
                </div>
            </div><br>
            
            <!-- footer for little info about author and coyright access with some links-->
            <div id="footer">
                <p class="container">
                    <e onclick="cpyr8 ()" title="click me">Shaikh Nazmul Islam Masud &#169; 2019 </e>
                    <a href="reg.php"><big>linkedin</big></a>
                    <a href="reg.php"><big>twitter</big></a>
                    <a href="reg.php"><big>facebook</big></a>
                </p>
            </div>
        </div>
    </body>
</html>

<!-- programming code to connect with database and sign in  -->
<?php  
  
//making the connection with the database
include("Config.php");  
if(isset($_POST['register']))  
{  
    // getting result from the registraion form when user submit the form.
    $user_name=$_POST['name'];  
    $user_pass=$_POST['psw'];  
    $user_email=$_POST['email'];  
    $user_username=$_POST['uname'];  

  
     
    //  checking if user already registered with that email.  
    $check_email_query="SELECT * FROM `customer` WHERE email='$user_email'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
        echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";  
        exit();  
    } 
    else
    {
        //insert the user into the database.  
        $insert_user="INSERT INTO `customer`(`id`,`name`,`username`,`email`,`password`) VALUES(NULL,'$user_name','$user_username','$user_email','$user_pass')";  
        if(mysqli_query($dbcon,$insert_user))  
        {  
            echo "<script> location.href='order.php'; </script>";
            exit;
        }
    }	
  
  
}  
  if(isset($_POST['login']))  
{  
    // checking the info from database to sign in
    $user_pass=$_POST['psw'];  
    $user_email=$_POST['email']; 
     

  
     
    // matching the email and password and let the user sign in 
    $check_email_query="SELECT * FROM `customer` WHERE email='$user_email' AND password='$user_pass'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
      // with the info, making next procedure
    if(mysqli_num_rows($run_query)>0)  
    {  
        echo "<script> location.href='order.php'; </script>"; 
        exit();  
    } 
    else
    {
        echo "<script>alert('Wrong username or password, try again');</script>";  
    }  
}  
?>