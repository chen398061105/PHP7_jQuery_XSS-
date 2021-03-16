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
<form action="./04_post.php" method="post" id="form">
  <div class="form-group">
    <label for="uid">用户名</label>
    <input type="text" name="uid" id="uid" class="form-control" placeholder="" aria-describedby="uid" value="">
  </div>
  <div class="form-group">
    <label for="pwd">密&nbsp;&nbsp;&nbsp;码</label>
    <input type="text" name="pwd" id="pwd" class="form-control" placeholder="" aria-describedby="pwd" value="">
  </div>

  <div class="form-check">
    <label>性&nbsp;&nbsp;&nbsp;别</label>
    <label class="form-check-label">
      <input type="radio" class="form-check-input" name="sex" id="" value="">
      男
    </label>
    <label class="form-check-label">
      <input type="radio" class="form-check-input" name="sex" id="" value="">
      女
    </label>
  </div>
  <div>
    <label>学&nbsp;&nbsp;&nbsp;历</label>
    <select name="type">
      <option value="1">小学</option>
      <option value="2">中学</option>
      <option value="3">高中</option>
    </select>
  </div>
  <div class="form-check">
    <label>爱&nbsp;&nbsp;&nbsp;好</label>
    <label class="checkbox-inline">
      <input type="checkbox" name="hobbies[]" id="inlineCheckbox1" value="option1"> 足球
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="hobbies[]" id="inlineCheckbox2" value="option2"> 篮球
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="hobbies[]" id="inlineCheckbox3" value="option3"> 羽毛球
    </label>
  </div>

  <button type="submit" name="sub">表单提交</button>
</form>
<a href="#" onclick="document.getElementById('form').submit()">通过链接点击提交</a>
</body>
</html>
<!--ajax使用提交-->
