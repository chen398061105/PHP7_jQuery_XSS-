$(function () {
//时时监听输入,固定委托格式
  $("body").delegate(".comment", "propertychange input", function () {
    //判断是否有值
    if ($(this).val().length > 0) {
      //设置可用
      $(".send").prop("disabled", false)
    } else {
      $(".send").prop("disabled", true)
    }
  });

  //开始监听按钮发布
  //拿到用户输入内容,发出再最前面
  $(".send").click(function () {
    var $text = $(".comment").val();
    var $weibo = creatEle($text);
    $(".messageList").prepend($weibo);
  });
  //凡是动态的都优先考虑时间委托
  //监听顶
  $("body").delegate(".up", "click", function () {
    $(this).text(parseInt($(this).text()) + 1);
  });
  //监听踩
  $("body").delegate(".down", "click", function () {
    $(this).text(parseInt($(this).text()) + 1);
  });
  //监听删除
  $("body").delegate(".del", "click", function () {
    $(this).parents(".info").remove();
  });

  //创建一个发布微博的方法
  function creatEle(text) {
    var $weibo = $("<div class=\"info\">\n" +
        "      <p class=\"infoText\">\n" + text +
        "      </p>\n" +
        "      <p class=\"infoOperation\">\n" +
        "        <span class=\"inofTime\">" + getTime() + "</span>\n" +
        "        <span class=\"infoHandle\">\n" +
        "                    <a href=\"javascript:;\" class='up'>0</a>\n" +
        "                    <a href=\"javascript:;\" class='down'>0</a>\n" +
        "                    <a href=\"javascript:;\" class='del'>删除</a>\n" +
        "                </span>\n" +
        "      </p>")

    return $weibo;
  }

  function getTime() {
    var $time = new Date();
    var $year = $time.getFullYear();
    var $month = $time.getMonth() + 1;
    var $day = $time.getDate();
    var $hour = $time.getHours();
    var $minute = $time.getMinutes();
    var $second = $time.getSeconds();
    return $year + '-' + $month + '-' + $day + ' ' + $hour + ':' + $minute + ':' + $second;
  }

});