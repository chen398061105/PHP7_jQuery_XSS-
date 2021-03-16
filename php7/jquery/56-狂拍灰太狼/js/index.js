$(function () {
  //监听游戏规则
  $(".rules").click(function () {
    $(".rule").stop().fadeIn(200);
  });
  //监听关闭游戏规则
  $(".close").click(function () {
    $(".rule").stop().fadeOut(200);
  });
  //监听开始按钮
  $(".start").click(function () {
    $(this).stop().hide();
    //监听时间进度条
    progressHandler();
    //灰太狼出现动画
    startWolfAnimation();
  });
  //监听重新开始按钮
  $(".reStart").click(function () {
    $(".mask").stop().hide();
    //重新监听进度条
    progressHandler();
    //重新开始,分数清零
    $(".score").text(0);
    startWolfAnimation();
  });

  /**
   * 灰太狼出现动画
   */
  var wolfTime;

  function startWolfAnimation() {
    //灰太狼和小灰灰
    var wolf_1 = ['./images/h0.png', './images/h1.png', './images/h2.png', './images/h3.png', './images/h4.png', './images/h5.png', './images/h6.png', './images/h7.png', './images/h8.png', './images/h9.png'];
    var wolf_2 = ['./images/x0.png', './images/x1.png', './images/x2.png', './images/x3.png', './images/x4.png', './images/x5.png', './images/x6.png', './images/x7.png', './images/x8.png', './images/x9.png'];
    // 2.定义一个数组保存所有可能出现的位置
    var arrPos = [
      {left: "100px", top: "115px"},
      {left: "20px", top: "160px"},
      {left: "190px", top: "142px"},
      {left: "105px", top: "193px"},
      {left: "19px", top: "221px"},
      {left: "202px", top: "212px"},
      {left: "120px", top: "275px"},
      {left: "30px", top: "295px"},
      {left: "209px", top: "297px"}
    ];
    //创建一个出现灰太狼出现图片
    var wolfImg = $("<img src='' class='wolfImg'>");
    //随机获取坐标图片位置
    var randIndex = Math.round(Math.random() * 8);
    //图片定位(随机)
    wolfImg.css({
      left: arrPos[randIndex].left,
      top: arrPos[randIndex].top,
      position: "absolute"
    });

    //随机获取图片类型
    $wolfType = Math.round(Math.random()) == 0 ? wolf_1 : wolf_2;

    //设置图片出现效果,当到第五章图时候,停止效果
    window.wolfIndex = 0;//设置全局变量.接下来的规则处理使用
    window.wolfIndexEnd = 5;
    wolfTime = setInterval(function () {
      if (wolfIndex > wolfIndexEnd) {
        //消除动画,结束执行
        wolfImg.remove();
        clearInterval(wolfTime);
        //继续出现其他的
        startWolfAnimation();
      }
      //图片追加内容(随机)
      wolfImg.attr("src", $wolfType[wolfIndex]);
      wolfIndex++;

    }, 300);

    //把定位好的图片追加到画面
    $(".container").append(wolfImg);
    //每点击到图片时候,设置得分规则
    scoreRule(wolfImg);
  }

  /**
   * 每点击一次灰太狼10分,小灰灰则抠10分
   */
  function scoreRule(wolfImg) {
    $(wolfImg).one("click", function () {
      //每次点完之后修改索引
      window.wolfIndex = 5;
      window.wolfIndexEnd = 9;
      //判断得到的是灰太狼还是小灰灰
      var isWolfType = wolfImg.attr("src").indexOf("h") >= 0;
      if (isWolfType) {
        //加10分
        $(".score").text(parseInt($(".score").text()) + 10);
      } else {
        //减10分
        $(".score").text(parseInt($(".score").text()) - 10);
      }
    });
  }

  /**
   * 灰太狼关闭动画
   */
  function stopWolfAnimation() {
    $(".wolfImg").remove();
    clearInterval(wolfTime);
  }

  /**
   * 进度条
   */
  function progressHandler() {
    //重新开始时候要回复进度条
    $(".progress").css({
      width: 180,
    });
    var timer = setInterval(function () {
      var width = $(".progress").width();
      width -= 3;//180/3 60s结束进度
      $(".progress").css({
        width: width,
      });
      //时间到了显示gameover
      if (width <= 0) {
        //关闭时间
        clearInterval(timer);
        $(".mask").stop().fadeIn(1000)
        //关闭动画
        stopWolfAnimation();
      }
    }, 1000);
  }
});