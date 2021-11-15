<script>
    if(sessionStorage.getItem('user').length > 0 && sessionStorage.getItem('pass').length > 0){
        window.location.href = "WEBPAGEshowAccountDetailsNext.php";
    }else{
	window.location.href = "WEBPAGEsignIn.php";
    }
</script>

<form  name="myForm" id="myForm" action="WEBPAGEshowAccountDetailsNext.php" method="POST">
    <input type="hidden" name="user" id="pass" value=""/>
    <input type="hidden" type="submit" value="Submit" />
</form>

<script>
    userName = sessionStorage.getItem('user').value;

    document.getElementById('user').value= userName

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