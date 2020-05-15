<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="dns-prefetch" href="https://github.githubassets.com">


  <link crossorigin="anonymous" media="all" integrity="sha512-FG+rXqMOivrAjdEQE7tO4BwM1poGmg70hJFTlNSxjX87grtrZ6UnPR8NkzwUHlQEGviu9XuRYeO8zH9YwvZhdg==" rel="stylesheet" href="https://github.githubassets.com/assets/frameworks-146fab5ea30e8afac08dd11013bb4ee0.css" />
  <link crossorigin="anonymous" media="all" integrity="sha512-O1SKNlmObf+mClSMy/rP1QT0sBX6slJTQ1w3GSdX6vAda01g08oytVCFe33FJ3dWK+xMgHv8wvSPrw4BsnzMRg==" rel="stylesheet" href="https://github.githubassets.com/assets/site-3b548a36598e6dffa60a548ccbfacfd5.css" />
  <link crossorigin="anonymous" media="all" integrity="sha512-bFZFlDEeVGFKSh8NDze1QwrLWzrvjH/+VWU4rKibeBTJPN5BuoKEHxgHTYiiSu3oPqW5yjiS1aqXeYvXumtCcQ==" rel="stylesheet" href="https://github.githubassets.com/assets/github-6c564594311e54614a4a1f0d0f37b543.css" />



  <title>用户登录</title>
  <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
  <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">


  <link rel="assets" href="https://github.githubassets.com/">



  <link rel="canonical" href="https://github.com/login" data-pjax-transient>


  <link rel="mask-icon" href="https://github.githubassets.com/pinned-octocat.svg" color="#000000">
  <link rel="alternate icon" class="js-site-favicon" type="image/png" href="https://github.githubassets.com/favicons/favicon.png">
  <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="https://github.githubassets.com/favicons/favicon.svg">



  <link rel="manifest" href="/manifest.json" crossOrigin="use-credentials">

</head>

<body class="logged-out env-production page-responsive session-authentication">


  <div class="position-relative js-header-wrapper ">


    <div class="header header-logged-out width-full pt-5 pb-4" role="banner">
      <div class="container clearfix width-full text-center">
        <a class="header-logo" href="#" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
          <svg height="48" class="octicon octicon-mark-github" viewBox="0 0 16 16" version="1.1" width="48" aria-hidden="true">
            <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
          </svg>
        </a>
      </div>
    </div>

  </div>

  <div id="start-of-content" class="show-on-focus"></div>

  <div class="application-main " data-commit-hovercards-enabled>
    <main id="js-pjax-container" data-pjax-container>


      <div class="auth-form px-3">

        <!-- '"` -->
        <!-- </textarea></xmp> -->
        <form action=" " accept-charset="UTF-8" method="post">
          <div class="auth-form-header p-0">
            <h1>用户登录</h1>
          </div>

          <div class="auth-form-body mt-3">

            <label for="login_field">
              用户名
            </label>
            <input type="text" name="username" id="username" class="form-control input-block" />

            <label for="password">
              密码
            </label>
            <input type="password" name="password" id="password" class="form-control form-control input-block" />

            <input type="submit" name="commit" id="login" value="登录" class="btn btn-primary btn-block" />
          </div>
        </form>
        <p class="create-account-callout mt-3">
          没有账号?
          <a href="./register.php">注册</a>.
        </p>
      </div>
    </main>
  </div>


  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(function(){
      $("#login").click(function(){
       var $username = $("#username").val(),
       $password = $("#password").val();
       if($username=='' || $password==''){
        alert("用户名或密码不能为空");
        return false;
      }else{
        var datas={
          username:$username,
          password:$password
        };
        $.ajax({
          url:'login_do.php',
          type:'post',
          dataType:'json',
          data:datas,
          success:function(result){
            if(result=='nameerror'){
              alert("用户名不存在");
            }else if(result=="passerror"){
              alert("密码错误");
            }else if(result=='success'){
              window.location.href="./main.php"
            }
          },
          error:function(e){
            alert("获取失败");
          }
        })
      }
      return false;
    })
    })
  </script>

</body>

</html>