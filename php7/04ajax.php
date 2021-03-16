<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="./jQuery-3.5.1.js"></script>
  <title>Document</title>
</head>
<body>
<div class="form-group">
  <label for="uid">用户名</label>
  <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="uid" value="">
</div>
<div class="form-group">
  <label for="pwd">密&nbsp;&nbsp;&nbsp;码</label>
  <input type="text" name="pwd" id="pwd" class="form-control" placeholder="" aria-describedby="pwd" value="">
</div>
<button type="submit" name="sub" onclick="doCheck();">ajax提交</button>
</body>
</html>
<!--ajax使用提交-->
<script>
  function doCheck() {
    username = $("#name").val();
    pwd = $("#pwd").val();

    $.ajax({
      type: "POST",
      url: "04_post.php",
      data: "name=" + username + "&pwd=" + pwd,
      success: function (data) {
        if (data == 1) {
          alert("登录成功!");
          location.href = "index.php";
        } else {
          alert("登录失败!")
        }
      }
    });
  }
</script>