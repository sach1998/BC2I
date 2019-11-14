function validate(uname, pwd){
    var xhttp = XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            var check = this.responseText;
            if(check == "false"){
                id("msg").textContent = "Wrong username or password";
                print("Success");
                return;
            }
        }
    };
    xhttp.open("POST","./login.php");
	xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhttp.send("username="+uname+"&password="+pwd);
}
