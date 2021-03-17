 {   function con(){
        var tmp = '';
        var uname = prompt("Username :", "");
        var passwd = prompt("Password :", "");
        var temp = ["IAM:LOST"];
        for (i = 0; i < temp.length; i++) {
            if (temp[i].indexOf(uname) == 0) {
                var Split = temp[i].split(":");
                var username = Split[0];
                var password = Split[1];
                if (uname == username && passwd == password) {
                    tmp = '1';
                    $.ajax({
                        type: "POST",
                        url: "./con.php",
                        data: {"tmp":tmp , "uname":uname , "passwd":passwd},
                        success: function(data,status){
                            eval(data)
                          }
                        });   


                    uname = " ";
                    passwd = " ";
                } else {
                    alert("0_0 We_don't_do_that_here 0_0")
                }
            }

        }
    }
}
