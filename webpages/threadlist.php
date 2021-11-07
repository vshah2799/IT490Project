<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }

    .container-1 {
        min-height: 433px;
        margin-left: 75px;
    }

    .posting {
        margin-left: 75px;
    }
    </style>
    <title>Thread</title>
</head>

<body>
    <?php include 'header.php';


        //   Opening threads in category 
        //   $id = $_GET['catid'];
        //   $sql = "SELECT * FROM `categories`";
          
        //   $result = mysqli_query($conn, $sql);
        //   while($row = mysqli_fetch_assoc($result)){
        //     $category = $row['catName'];
        //     $desc = $row['catDesc'];

        //   }

        $showAlert = false;
        $method =$_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            //inserting info abt thread
            $titleTopic = $_POST['title'];
            $tDesc = $_POST['desc'];
            $sql ="INSERT INTO `threads` (`topic`, `threadDesc`, `threadUserID`, `timeStamp`) VALUES ('$titleTopic', '$tDesc', '0', 'current_timestamp()');";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="success">
                    <strong>Success! </strong> Thread succesfully posted!
                
              </div>
                ';

            }
        }
        

    ?>
    <!-- Jumbotron box to display category information -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to the forums!</h1>
            <p>Please be nice</p>

        </div>
        <h1 class="py-2">Post your own thread</h1>
    </div>
    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" class="posting">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Subject</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                placeholder="Topic subject">

        </div>
        <div class="form-floating">
            <label for="floatingTextarea2">Explain the subject</label>
            <textarea class="form-control" id="desc" name="desc" style="height: 100px"></textarea>

        </div>
        <button type="submit" class="btn btn-success my-4">Post</button>
    </form>
    <!-- displaying threads -->
    <div class="container-1">

        <?php
            $count = 0;
            $noResult = true;
            // $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $count++;
                $title = $row['topic'];
                $desc = $row['threadDesc'];
                if($count == 1){
                    echo '<h1 class="py-2">Browse Threads</h1>';
                }
                if ($count == 0){
                    echo '<h1 class="py-2">No replies found!</h1>';
                }

                echo '<div class="media my-4">
                    <img src="images/unknown.jpg" width="5%" class="mr-3" alt="">
                    <div class="media-body">
                        <h5 class="mt-0 my-2"><a href="thread.php?tID='.$row['threadID'].'" class="text-dark">'.$title.'</a></h5>
                        '.$desc.'
                    </div>
                </div>';
  
            }

        ?>

    </div>

    <?php include 'footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
