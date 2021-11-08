<!DOCTYPE html>
<html>

<head>
    <title>Market Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="marketStyle.css">
</head>

<body>
    <?php
    include 'connect.php';
    include 'header.php';
    $showAlert = false;
    if(isset($_POST['carSend'])){




            //inserting info abt car


            $carName1 =  $_POST['carName'];
            $carDesc1 =  $_POST['carDesc'];
            $dealer1 =  $_POST['ownerName'];
            $contact1 =  $_POST['contactInfo'];

            echo $carDesc1;

            if((strlen($carName1))&&(strlen($carDesc1))&&(strlen($dealer1))&&strlen($contact1)){

                $sql = shell_exec("php ~/Desktop/IT490Project/rabbitMQFiles/marketPlaceRabbitMQClient.php \"Market1\" $carName1, $carDesc1, $dealer1, $contact1");

                if($sql){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="success">
                        <strong>Success! </strong> Car succesfully listed!
                    
                </div>
                    ';

            }
            $titleTopic = "";
            $tDesc = "";
            }
            
        }
    ?>
    <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#carModal">Sell your car</button>


    <?php




        //getting info abt cars to display

            $result = shell_exec("php ~/Desktop/IT490Project/rabbitMQFiles/marketPlaceRabbitMQClient.php \"Market2\"");

            while($row = mysqli_fetch_assoc($result)){
            $carName = $row['carName'];
            $carDesc = $row['carDesc'];
            $dealer = $row['ownerName'];
            $contact = $row['contactInfo'];


            echo'
            <div class="card mb-3">
                <div class="row g-5">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <img src="https://source.unsplash.com/500x300/?'.$carName.'" class="img-fluid-rounded-start" alt="Responsive image">
                            <h5 class="card-title"><a href="car.php?tID='.$row['carID'].'" class="text-dark">'.$carName.'</a></h5>
                            <p class="card-text">'.$carDesc.'</p>
                            <p class="card-text"><b>Dealer Name: </b>'.$dealer.'<b> Contact: </b>'.$contact.'</p>
                        </div>
                    </div>
                </div>
            </div>';
            
    }
    ?>

    <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="signModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carModalLabel">List your car</h5>
                </div>
                <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                    <div class="modal-body">
                        <!-- card-->
                        <div class="mb-3">
                            <label for="carName" class="form-label">car Name</label>
                            <input type="text" name="carName" class="form-control" id="carName">
                        </div>
                        <div class="form-floating">
                            <label for="carDesc">Car Description</label>
                            <textarea class="form-control" id="carDesc" name="carDesc" style="height: 100px"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="ownerName" class="form-label">Your Name</label>
                            <input type="text" name="ownerName" class="form-control" id="ownerName">

                        </div>
                        <div class="mb-3">
                            <label for="contactInfo" class="form-label">Your email</label>
                            <input type="text" name="contactInfo" class="form-control" id="contactInfo">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="carSend" class="btn btn-primary">List</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>


