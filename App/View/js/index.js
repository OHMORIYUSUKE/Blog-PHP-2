$(function () {
  // ★marked.js の設定
  marked.setOptions({
    breaks: true,

    // highlight.js でハイライトする
    highlight: function (code, lang) {
      return hljs.highlightAuto(code, [lang]).value;
    },
  });

  // highlight.js の初期処理
  hljs.initHighlightingOnLoad();

  // ★マークダウンを HTML に変換して再セット
  var md = marked(getHtml(".articleView"));
  $(".articleView").html(md);
});

// 比較演算子が &lt; 等になるので置換
function getHtml(selector) {
  var html = $(selector).html();
  html = html.replace(/&lt;/g, "<");
  html = html.replace(/&gt;/g, ">");
  html = html.replace(/&amp;/g, "&");

  return html;
}
