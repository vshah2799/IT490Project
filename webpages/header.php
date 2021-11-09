<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./webpages/forums.php">Forums</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./webpage/signIn.php">Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

=======
<?php
$loggedIn = false;


echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="/project/webpages/index.php">oooreo</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/project/webpages/index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled"href="#" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <div class="row mx-2">
    <form class="form-inline my-2 my-lg-0">
        <input type="search" class="form-control" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 type="submit">Search</button>
    </form>';
    
    
    // If user not logged in sign in and register button displayed. if logged in then logout button is displayed.



    if($loggedIn != true){
      echo'<button class="btn btn-primary ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
      <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#signupModal">Sign up</button>';
    }else{
      echo '<button class="btn btn-primary mx-2" data-toggle="modal" data-target="#signupModal">Sign out</button>';
    }
    echo'
    </div>
    
    
    </div>
</nav>';
include 'connect.php';

//Registering user query 





if(isset($_POST['saveData'])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $sql = "INSERT INTO `users` (`userID`, `email`, `firstName`, `lastName`, `password`, `address`, `make`, `model`, `year`) VALUES ('$username', '$email', 'NULL', 'NULL', '$password', 'NULL', 'NULL', 'NULL', 'NULL');";

    $result = mysqli_query($conn, $sql);
    

    
  
}


//Loading data to check if the user's credentials match





if(isset($_POST['loadData'])){
  $checkUsername = $_POST["checkUsername"];
  $checkPassword = $_POST["checkPassword"];

  $sql = "SELECT * FROM `users` WHERE `userID`='$checkUsername'";

  $result = mysqli_query($conn, $sql);
  
  $row = mysqli_fetch_assoc($result);
    if($row['password']==$checkPassword){
      


      // header("location: showAccountDetails.php");
    }


}

// include 'loginModal.php';
// include 'signupModal.php';
?>

<!-- Sign up modal that pops up when the sign up button is clicked in header -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                <div class="modal-body">
                    <!-- card-->


                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" name="username" class="form-control" id="username">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm password</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="saveData" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="signModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                <div class="modal-body">
                    <!-- card-->
                    <div class="mb-3">
                        <label for="checkUsername" class="form-label">username</label>
                        <input type="text" name="checkUsername" class="form-control" id="checkUsername">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="checkPassword" class="form-control" id="checkPassword">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="loadData" class="btn btn-primary">Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>
>>>>>>> 455777ae18b9be71d05bc7de4fdee00a6e8a4502
