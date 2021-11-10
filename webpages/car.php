<?php include 'header.php';
            $id = $_GET['tID'];

            //getting car info to display
            $result = shell_exec("php ../rabbitMQFiles/marketPlaceRabbitMQClient.php \"Market3\" $id ");

            while($row = mysqli_fetch_assoc($result)){
                $carName = $row['carName'];
                $carDesc = $row['carDesc'];
                $dealer = $row['ownerName'];
                $contact = $row['contactInfo'];
                echo'<div class="card mb-3">
                <img src="https://source.unsplash.com/1500x300/?f1" style="window.screen.width;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'.$carName.'</h5>
                    <p class="card-text">'.$carDesc.'</p>
                    <p class="card-text"><small class="text-muted"><b>Dealer Name: </b>'.$dealer.'<b> Contact: </b>'.$contact.'</small></p>
                </div>
            </div>';
            }
        ?>

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
    <title><?php echo $carName; ?></title>

</head>

<body>
    

    
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
