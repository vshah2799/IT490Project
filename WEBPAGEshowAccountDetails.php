<script>
    userName = sessionStorage.getItem('user');
    password = sessionStorage.getItem('pass');
    
    if(userName.length > 0 && password.length > 0){
        window.location.href = "WEBPAGEshowAccountDetailsNext.php";
    }else{
	window.location.href = "WEBPAGEsignIn.php";
    }
</script>
