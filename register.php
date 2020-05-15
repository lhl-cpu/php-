<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>注册页面</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .container {
      width: 1000px;
      height: 600px;
      margin: 25px auto;
      background: #4c4c4c;
    }

    .left {
      width: 60%;
      height: 80%;
      display: block;
      float: left;
      margin-top: 60px;
      position: relative;
      background-image: url("https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1589533875057&di=388453b9240ab2c97c793982c5133ac1&imgtype=0&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F011f875b9d4b3ca801213deac7427c.gif");
    }

    .left_text {
      position: absolute;
      bottom: 50%;
      left: 35%;
      color: white;
      font-size: 50px;
      font-weight: 600;

    }

    .right {
      width: 40%;
      height: 80%;
      display: block;
      float: right;
      margin-top: 60px;
      background: #f3f9f1;
    }

    .reg-box {
      width: 400px;
      height: 430px;
    }

    .reg-form {
      width: 400px;
      height: 320px;
    }

    .reg-form input {
      width: 60%;
      margin: 20px;
      padding: 10px;
      float: left;
      background-color: transparent;
      border: none;
      font-size: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.42);
      outline: none;
      color: #4c4c4c;
    }

    .reg-form div {
      height: 80px;
    }

    .reg-sub {
      width: 400px;
      height: 70px;
    }

    .reg-sub input {
      width: 54%;
      margin: 20px 88px;
      padding: 10px 0;
      font-size: 16px;
      font-weight: 100;
      background: transparent;
      color: #4c4c4c;
      border: 1px solid rgba(0, 0, 0, 0.42);
      border-width: thin;
      cursor: pointer;
      outline: none;
      -webkit-transition: 0.5s all;
      text-decoration: none;
    }

    .bottom {
      width: 100%;
      height: 60px;
      line-height: 60px;
      text-align: center;
    }

    .bottom label {
      color: rgba(255, 255, 255, 0.56);
      font-size: 13px;
    }

    .reg-form label {
      font-size: 12px;
      line-height: 78px;
      color: #ff461f;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- 注册页面左图 -->
    <div class="left">
      <div class="left_text">
        用户注册
      </div>
    </div>
    <!-- 注册栏 -->
    <div class="right">
      <br><br><br>
      <div class="reg-box">
        <form action="" id="formId" class="reg-form" method="POST">
          <div>
            <tr>
              <td><input type="text" name="username" id="username" placeholder="用户名" οnblur="InputUsernameBlur()"></td>
              <td><label id="errorName"></label></td>
            </tr>
          </div>
          <div>
            <tr>
              <td><input type="password" name="password" id="password" placeholder="密码" οnblur="InputPasswordBlur()"></td>
              <td><label id="errorPassword"></label></td>
            </tr>
          </div>
          <div>
            <tr>
              <td><input type="password" name="repassword" id="repassword" placeholder="确认密码" οnblur="InputRepasswordBlur()"></td>
              <td><label id="errorRepassword"></label></td>
            </tr>
          </div>
          <br><br><br>
          <div class="reg-sub">
            <input type="button" id="register" value="免费注册">
          </div>
        </form>
      </div>
    </div>
    <div class="bottom">
      <label>© 安阳学院 计科学院 ｜ 计算机科学与技术 172810144</label>
    </div>
  </div>
  <!-- regist.js -->
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  
  <script>
   $(function(){
    $("#register").click(function(){
      var $username = $("#username").val(),
      $password  = $("#password").val(),
      $repassword = $("#repassword").val();
      if($username=='' || $password==''){
        alert("用户名及密码不能为空");
        return false;
      }else if($password != $repassword){
          alert("两次密码不一致");
      }else{
        var datas={
          username:$username,
          password:$password
        }
        $.ajax({
          url:'register_do.php',
          type:'post',
          data:datas,
          dataType:'json',
          success:function(reslut){
            if(reslut=="repeat"){
              alert("该用户名已存在");
            }else if(reslut=='success'){
              window.location.href="./main.php"
            }
            else{
              alert('false');
            }
          }
        })
      }return false;
    })
  })
</script>
</body>

</html>