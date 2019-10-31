<!doctype html>
<html>
    <head>
        <!-- bootstrap links, meta contents and references -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- external css link -->
        <link rel="stylesheet" href="styleorderform.css" />
        <!-- title shows in the browser bar -->
        <title>Order Form - Plant Future</title>
        
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
            function placeorder () {
                alert("Your order is successfully placed into database");
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
                    <div id="F13">
                        <a href="index.php"><button class="btn btn-dark my-sm-0">Sign Out</button></a>
                    </div>
                    <div id="F13">
                        <a href="order.php"><button class="btn btn-dark my-sm-0">Cancel Order</button></a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- this is menu div -->
        <nav>
            <div id="menu">
                <ul>
                    <a href="#"><li>Menu</li></a>
                    <a href="#"><li>Item</li></a>
                    <a href="#"><li>Item</li></a>
                    <a href="#"><li>Item</li></a>
                    <a href="#"><li>Item</li></a>
                    <a href="#"><li>Item</li></a>
                    <a href="#"><li>Item</li></a>
                    <a href="#" onclick="about ()"><li>About</li></a>
                </ul>
            </div>
        </nav>
        
        <!-- main body, contains reg form -->
        <div id="b11">
            <div>
                <!-- Order Placement Form-->
                <div>
                  <form method="POST">
                    <div class="container">
                      <label for="name"><b>Full Name:</b></label><br>
                        <input type='text' placeholder="Enter Your Name" name="name" id='txtName' required><br>
                        
                      <label for="item"><b>Item Name:</b></label><br>
                        <input type='text' placeholder="Enter Item Name" name="item" id='txtName' required><br>

                      <label for="quantity"><b>Quantity:</b></label><br>
                      <input type='text' placeholder="Enter Quantity" name="quantity" required /><br>

                      <label for="address"><b>Full Address:</b></label><br>
                      <input type="text" placeholder="Enter Your Address" name="address" required><br><br>

                      <button class="btn btn-dark" style="float: left;" name="register" type="submit" onclick="placeorder ()">Place Order</button>
                        
                    </div>

                    <div class="container" >
                      <a href="order.php"><button type="button" class="cancelbtn btn btn-dark" style="margin-left: 20px;">Cancel Order</button></a>
                    </div>
                  </form>
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

if(isset($_POST['register']))  //for sign up option
{  
    // getting result from the registraion form when user submit the form.
    $user_name=$_POST['name'];  
    $user_item=$_POST['item'];  
    $user_quantity=$_POST['quantity'];  
    $user_address=$_POST['address'];  

  
     
    // checking username again for placing order.  
    $check_name_query="SELECT * FROM `customer` WHERE name='$user_name'";  
    $run_query=mysqli_query($dbcon,$check_name_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {
    //insert the user into the database.  
    $insert_user="INSERT INTO `orderitem`(`id`,`name`,`item`,`quantity`,`address`) VALUES(NULL,'$user_name','$user_item','$user_quantity','$user_address')";  
    if(mysqli_query($dbcon,$insert_user))  
    {  
        echo "<script> location.href='order.php'; </script>";
        exit();//ekhne bracket dici dekhi kaj kre kina
    }
    } 
    else
    {  
        echo "<script>alert('This name $user_name is not matching, please confirm your name first!')</script>";  
        exit();  
    }	  
}   
?>