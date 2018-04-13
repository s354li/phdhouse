<html>
    
    <head>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <meta charset="UTF-8">
        
        <style type="text/css">
            a:hover {
                cursor:pointer;
            }
        </style> 
    </head>
    
    <body>
        
        <div class="container">
            
            <div class="row">
                
                <div class="col-sm-9" >
                    
                    <img src="/background.jpeg" class="img-fluid" style="width: 100%;height: auto;" />
                </div>
                
                <div class="col-sm-3" >
                    
                    <div class="row">

                        <div class="col-sm-6">

                            <h1 style="overflow: hidden;">欢迎</h1>
                        </div>
                    </div>

                    <div class="row">
                        <br><br>
                        <label>用户名</label>
                        <br><br>
                        <input id="inputUsername" type="text" />
                        <br><br>
                        <label>密码</label>
                        <br><br>
                        <input id="inputPassword" type="password" />
                        <br><br>
                        <a style="text-decoration: none;"><p>忘记密码</p></a>
                        <br><br>
                    </div>

                    <div class="row">

                        <div class="col-sm-4">

                            <button id="buttonSignIn" class="btn btn-success">
                                <h3>登录</h3>
                            </button>
                        </div>

                        <div class="col-sm-8">

                            <button id="buttonSignUp" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                <h3>注册</h3>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
<!---->
<! sign up modal>   
<!---->
            <div id="myModal" class="row modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            填写您的信息
                        </div>
                        <div class="modal-body">
                            
                            <div class="row">
                                <label>用户名</label>
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-sm-8">
                                    <input id="createUsername" type="text" name="username" />
                                </div>
                                
                                <div id="createVerifyUsername" class="col-sm-4">
                                </div>
                            </div>
                            
                            <div class="row">
                                <label>密码</label>
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-sm-8">
                                    <input id="createPassword" type="password" name="password" />
                                </div>
                                
                                <div class="col-sm-4">
                                    <p id="createVerifyPassword">ppp</p>
                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button id="signUpButton" data-dismiss="modal">提交</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            
            var fd = new FormData();
            
            $("#buttonSignIn").click(()=>{
                
                if( $("#inputUsername").val()!="" && $("#inputPassword").val()!="" ){
                    
                    fd.append("username", $("#inputUsername").val());
                    fd.append("password", $("#inputPassword").val());
                    
                    $.ajax({
                        url: "http://127.0.0.1/index.php/UserQueryLogin/QueryLogin",
                        type: "post",
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: (return_msg)=>{
                            
                            if(return_msg.includes("invalid username")){
                                
                                alert("用户名不存在");
                            }
                            else if(return_msg.includes("password correct")){
                                
                                alert("登录成功");
                            }
                            else if(return_msg.includes("password incorrect")){
                                
                                alert("密码错误");
                            }
                            else{
                                
                            }
                        }
                    });
                }
                else{
                    
                    if( $("#inputUsername").val()=="" && $("#inputPassword").val()=="" ){
                        
                        alert("请输入用户名和密码");
                    }
                    else if( $("#inputUsername").val()!="" ){
                       
                        alert("请输入密码");
                    }
                    else{
                        
                        alert("请输入用户名");
                    }      
                }    
            });
            
            $("#signUpButton").click(()=>{
                
                fd.append("username", $("#createUsername").val());
                fd.append("password", $("#createPassword").val());
                
                $.ajax({
                    
                    url: "http://127.0.0.1/index.php/UserQueryRegister/QueryRegister",
                    type: "post",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: (return_msg)=>{
                        
                        if(return_msg.includes("succeed")){
                            
                            alert("注册成功");
                        }
                        else if(return_msg.includes("not succeed")){
                            
                            alert("注册不成功");
                        }
                        else{
                            
                            alert(return_msg);
                        }
                    }
                });
            });
//--
//--real-time checking username availability
//--
            $("#createUsername").on('input', ()=>{
                
                var letterStr = "abcdefghijklmnopqrstuvwxyz";
                var numberStr = "1234567890";
                
                var count_letter = 0;
                var count_number = 0;

                for(i=0; i<$("#createUsername").val().length; i++){
                    
                    for(j=0; j<letterStr.length; j++){

                        if( $("#createUsername").val().charAt( i ) == letterStr.charAt(j) ){

                            count_letter++; 
                        }
                        else{

                        }
                    }

                    for(j=0; j<numberStr.length; j++){

                        if( $("#createUsername").val().charAt( i ) == numberStr.charAt(j) ){

                            count_number++; 
                        }
                        else{

                        }
                    }
                }
                
                //for debug, for username, password input verification
                $("#createVerifyUsername").html("letter: "+count_letter+";number: "+count_number);
                
                var div_verifyLetter = document.createElement("div");
                var div_verifyNumber = document.createElement("div");
            });  
        </script>
    </body>
</html>