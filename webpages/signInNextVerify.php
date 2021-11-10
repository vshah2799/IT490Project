<!DOCTYPE html>
<?php include 'header.php'; ?>

<script>
	tempUser = sessionStorage.getItem("user");
	tempPass = sessionStorage.getItem("pass");
</script>

<?php
$user = "<script>document.writeln(tempUser);</script>";
$pass = "<script>document.writeln(tempPass);</script>";

$result = shell_exec("php ../rabbitMQFiles/signUpRabbitMQClient.php $user $pass");

if ($result)
{
	echo "SUCCESS, SIGNED IN";
}
else
{
	echo "SIGN IN FAILED, YOU WILL BE REDIRECTED IN 5 SECONDS";
	sleep(5);
	header("signIn.php");
}
