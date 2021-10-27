<?php
	require mysqlconnect.php;	
?>
<html>
	<head>
		<title>forums</title>
	</head>
<body>
<!---Navbar-->
	<nav class="navbar navbar-dark">
		<div class="container">
			<h1><a href="#" class="navbar-brand">Forum</a></h1>
		      <form class="form-incline">
			<input type="text" class="form-control mr-3 mb-2 mb-sm-0" placeholder="search">
			<button type="search" class=btn btn-dark>Search</button>
		      </form>
		</div>
	</nav>
	
            <div class="vm-placement hidden" data-id="5e79f54d963d0e25e62b5f51"></div>
              <table class="table standard-box">
                <tbody><tr class="tableheader">
                  <td>Topic</td>
                  <td>Replies</td>
                  <td class="author-header">Author</td>
                  <td>Activity</td>
                </tr>
                <tr class="tablerow">
                  <td class="name"><a href="/forums/threads/1/Dick">Dick</a></td>
                  <td class="replies">1</td>
                  <td class="author"><a href="/profile/131/hotboy">hotboy</a></td>
                  <td class="activity"><span class="smartphone-only">8h</span><span class="gtSmartphone-only">8 hours ago</span></td>
                </tr>
                <tr class="tablerow">
                  <td class="name"><a href="/forums/threads/2/Balls">Balls</a></td>
                  <td class="replies">2</td>
                  <td class="author"><a href="/profile/132/coolboy">coolboy</a></td>
                  <td class="activity"><span class="smartphone-only">10h</span><span class="gtSmartphone-only">10 hours ago</span></td>
                </tr>
          </table>		
	
                <div class="standard-box">
                  <div class="two-col">
                    <div class="col">
                      <div class="standard-headline">Subject</div>
<input type="text" name="subject" class="width100" value="" placeholder="Topic title"></div>
                    
                  </div>
                  <div class="spacer"></div>
                  <div class="standard-headline">Topic</div>
<textarea class="width100 textarea" name="topic"></textarea></div>
                <div class="spacer"></div>
<button type="submit" class="button">Post new topic</button>
</body>
</html>

<?php
$check = mysqli_query($mydb."SELECT * FROM topics");

if(mysqli_num_rows($check != 1){
	while($row = mysqli_fetch_assoc($check)){
		echo($row['subject']);
		echo("<br>");
	}

}else{
	echo "looks mad empty";
}

$subject = @$_POST[subject];
$topic = @$_POST[topic];

if(isset($_POST['button1'])){
	echo "$subject";
	if($query = mysql_query($mydb,"INSERT INTO `forums` (`username`,`topic`, 'subject') VALUES ('sample','$topic','$subject',5)")){
		echo "nice";
	}else{
		echo "not nice";
	}
	
}

?>
