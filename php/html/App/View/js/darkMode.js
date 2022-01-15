window.onload = function () {
  // ここに読み込み完了時に実行してほしい内容を書く。
  var result = document.cookie.indexOf('dark');
  if(result == -1){ //ダークモードオフ
    //window.alert("ダークモードoff");
    darkOff();
  }else{
    //window.alert("ダークモードon");
    darkOn();
  }
  };

//ダークモード
//onの時はクッキーあり(作る)
//offの時はクッキーなし(削除)
var i = 1;

var result = document.cookie.indexOf('dark');
if (result == -1) {
  i = 2;
}
//ボタンが押されるたびに実行される---------------------------------------------------------
function dark() {
 var flag = i%2;
 if(flag == 1){ //ダークモードオフ
  document.cookie = 'dark=on; max-age=0';
  //console.log(document.cookie);
  //window.alert("off");
  console.log("off");
  flag = 1;
 }else{ //ダークモードオン
  const time = 60*60*24; //クッキーの保存時間(1日)
  document.cookie = 'dark=on; max-age='+time;
  //console.log(document.cookie);
  //window.alert("on");
  console.log("on");
  flag = 0;
 }
 //var result = document.cookie.indexOf('dark');
 //window.alert(result);//ダークモードoffの時に-1を返す
 if(flag == 1){ //ダークモードオフ
  //window.alert("off");
  darkOff();
 }else if(flag == 0){ //ダークモードオン
   //window.alert("on関数内");
   darkOn();
 }
 i+=1;
}
//---------------------------------------------------------------------------------------

function darkOn(){ //onの状態
  $("meta").css({
    content: "black",
  });
  $(".externalLink").css({
    filter: "invert(100%)",
  });
  $(".commentObject").css({
    backgroundColor: "#2E2E2E",
  });
   $(".commentTitleImage").css({
    filter: "invert(100%)",
  });
   $(".dark").css({
    backgroundColor: "#fff",
    opacity:"3",
  });
  $(".dark").text("🌞")
  $(".sns").css({
    filter: "invert(100%)",
  });
  $(".timeImage").css({
    filter: "invert(100%)",
  });
  $(".eye").css({
    filter: "invert(100%)",
  });
  $("td").css({
    color: "#fff",
  });
   $("p").css({
    color: "#fff",
  });
  $("h1").css({
    color: "#fff",
  });
  $("h2").css({
    color: "#fff",
  });
  $("h3").css({
    color: "#fff",
  });
  $("a").css({
    color: "#fff",
  });
  $("li").css({
    color: "#fff",
  });
  $("dt").css({
    color: "#fff",
  });
  $("footer").css({
    color: "#fff",
  });
  $(".tag").css({
    color: "#fff",
    border: "1px solid #cacaca",
  });//border: 1.6px solid #999;//.hljs border: solid 1.3px #ccc;
  $(".hljs").css({
    border: "solid 1.3px #fff",
    backgroundColor: "#1D1F21",
  });
  $("body").css({
    backgroundColor: "black",
  });
}

function darkOff(){ //offの状態
  $(".hljs").css({
    border: "",
    backgroundColor: "",
  });
  $("meta").css({
    content: "",
  });
  $(".externalLink").css({
    filter: "invert(0%)",
  });
  $(".commentObject").css({
    backgroundColor: "",
  });
  $(".commentTitleImage").css({
    filter: "invert(0%)",
  });
  $(".dark").css({
    backgroundColor: "",
  });
  $(".dark").text("🌙")
  $(".sns").css({
    filter: "invert(0%)",
  });
  $(".timeImage").css({
    filter: "invert(0%)",
  });
  $(".eye").css({
    filter: "invert(0%)",
  });
  $("td").css({
    color: "",
  });
  $("p").css({
    color: "",
  });
  $("h1").css({
    color: "",
  });
  $("h2").css({
    color: "",
  });
  $("h3").css({
    color: "",
  });
  $("a").css({
    color: "",
  });
  $("li").css({
    color: "",
  });
  $("dt").css({
    color: "",
  });
  $(".tag").css({
    color: "",
    border: "",
  });
  $("footer").css({
    color: "",
  });
  $("body").css({
    backgroundColor: "",
  });
}