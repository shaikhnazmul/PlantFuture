<!doctype html>
<html>
    <head>
        <!-- bootstrap links, meta contents and references -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- external css link -->
        <link rel="stylesheet" href="styleindex.css" />
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
                
                if (!filter.test(email.value)) {
                    alert('ki vabco! vul email diba r ami bujhbo na!');
                    email.focus;
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
                            <input for="email" id="txtEmail" type='text' name="email" placeholder="email" required />
                            <input for="psw" type="password" name="psw" placeholder="password" required />
                            
                            <button name="login" class="lbtn btn-dark" type="submit">Sign In</button>
                        </form>
                    </div>
                    <div id="F13">
                        <a href="reg.php"><button class="btn btn-dark my-sm-0">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- this is menu div -->
        <nav>
            <div id="menu">
                <ul>
                    <a href="index.php"><li>Menu</li></a>
                    <a href="index.php"><li>Item</li></a>
                    <a href="index.php"><li>Item</li></a>
                    <a href="index.php"><li>Item</li></a>
                    <a href="index.php"><li>Item</li></a>
                    <a href="index.php"><li>Item</li></a>
                    <a href="index.php"><li>Item</li></a>
                    <a href="index.php" onclick="about ()"><li>About</li></a>
                </ul>
            </div>
        </nav>
        
        <!-- main body, contains the img, name and description -->
        <div id="b11">
            <div class="container" id="row">
                <div class="column">
                    <img src="img/rat.jpg" alt="Rat at food" title="Rat found food" />
                    <h2>Mio-a story of rat</h2>
                    <p>Mio is a rat who just helped his another rat brother for cock good stuff. Mio only know how to eat and have lot of friends. Mio is a rat who just helped his another rat brother for cock good stuff. Mio only know how to eat and have lot of friends. Mio is a rat who just helped his another rat brother for cock good stuff. Mio only know how to eat and have lot of friends. Mio is a rat who just helped his another rat brother for cock good stuff. Mio only know how to eat and have lot of friends.</p>
                    <a href="#" onclick="readmore ()">Read more</a>
                </div>
                <div class="column">
                    <img src="img/tangled.jpg" alt="Puscle" title="Puscle" />
                    <h2>Puscle</h2>
                    <p>Puscle is a pet of rupanzel in tangled movie who is so much sweet and helpful. Helped to kill the enemy, the old lady in the movie. Puscle is a pet of rupanzel in tangled movie who is so much sweet and helpful. Helped to kill the enemy, the old lady in the movie. Puscle is a pet of rupanzel in tangled movie who is so much sweet and helpful. Helped to kill the enemy, the old lady in the movie. Puscle is a pet of rupanzel in tangled movie who is so much sweet and helpful. Helped to kill the enemy, the old lady in the movie.</p>
                    <a href="#" onclick="readmore ()">Read more</a>
                </div>
                <div class="column">
                    <img src="img/ratcook.jpg" alt="Rat is cooking" title="RATATOUILLE (2007)" />
                    <h2>Ratatouille</h2>
                    <p>"This is me" well, the movie starts with this dialogue from the hero who is a small rat and knows how to cook good stuffs better than human. "This is me" well, the movie starts with this dialogue from the hero who is a small rat and knows how to cook good stuffs better than human. "This is me" well, the movie starts with this dialogue from the hero who is a small rat and knows how to cook good stuffs better than human.</p>
                    <a href="#" onclick="readmore ()">Read more</a>
                </div>
            </div><br>
            
            <!-- footer for little info about author and coyright access with some links-->
            <div id="footer">
                <p class="container">
                    <e onclick="cpyr8 ()" title="click me">Shaikh Nazmul Islam Masud &#169; 2019 </e>
                    <a href="#"><big>linkedin</big></a>
                    <a href="#"><big>twitter</big></a>
                    <a href="#"><big>facebook</big></a>
                </p>
            </div>
        </div>
    </body>
</html>

<!-- programming code to connect with database and sign in  -->
<?php  
  
//making the connection with the database
include("Config.php"); 
  
  if(isset($_POST['login']))  //for sign in option
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