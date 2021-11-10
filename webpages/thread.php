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
    .media-body{
        margin-top: 10px;
    }
    .container-1{
        min-height: 433px;
        margin-left: 75px;  
    }
    .posting-replies {
        margin-left: 75px;
    }
    </style>
    <title>Thread</title>
</head>

<body>
    <?php include 'header.php';
          $id = $_GET['tID'];
          $row = shell_exec("php ../rabbitMQFiles/threadRabbitMQClient.php \"Thread1\" $id");
          $thread = $row['topic'];
          $desc = $row['threadDesc'];


          $showAlert = false;
          $method =$_SERVER['REQUEST_METHOD'];

          if($method == 'POST'){
            //inserting info abt thread
            // $titleTopic = $_POST['title'];
            $comm = $_POST['desc'];


            $sql = shell_exec("php ../rabbitMQFiles/threadRabbitMQClient.php \"Thread2\" $id");

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
            <h1 class="display-4"><b><?php echo $thread ?></b></h1>
            
            <hr class="my-4">
            <p><?php echo $desc?></p>
        </div>

    </div>
    <form class="posting-replies">
        <div class="form-floating">
            <label for="floatingTextarea2">Post your reply</label>
            <textarea class="form-control" id="desc"name="desc"
                style="height: 100px"></textarea>

        </div>
        <button type="submit" class="btn btn-success my-4">Post</button>
    </form>
    <!-- displaying threads -->
    <div class="container-1">
        
        <?php
            $count =0;
            $id = $_GET['tID'];

            $result = shell_exec("php ../rabbitMQFiles/threadRabbitMQClient.php \"Thread3\" $id");

            while($row = mysqli_fetch_assoc($result)){
                $count++;
                $title = $row['content'];
                if($count == 1){
                    echo '<h1 class="py-2">Browse Replies</h1>';
                }
                

                echo '<div class="media">
                    <img src="images/unknown.jpg" width="5%" class="mr-3" alt="">
                    <div class="media-body">
                        
                        '.$title.'
                    </div>
                </div>';
  
            }
            if ($count == 0){
                echo '<h1 class="py-2">No replies found!</h1>';
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
