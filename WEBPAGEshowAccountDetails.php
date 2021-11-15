<script>
    if(sessionStorage.getItem('user').length > 0 && sessionStorage.getItem('pass').length > 0){
    }
    else{
	window.location.href = "WEBPAGEsignIn.php";
    }
</script>

<form  name="myForm" id="myForm" action="WEBPAGEshowAccountDetailsNext.php" method="POST">
    <input type="hidden" name="user" id="user" value=""/>
    <input type="hidden" type="submit" value="Submit" />
</form>

<script>
    userName = sessionStorage.getItem('user');
    userName = userName.trim();
    document.getElementById('user').value = userName;
  
    var auto_refresh = setInterval(
        function()
        {
            submitform();
        }, 1000);

    function submitform()
    {
        document.myForm.submit();
    }
</script>
