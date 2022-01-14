<!DOCTYPE html>
<html lang="ja">
  <head>
    {$head}
  </head>

  <body>
    {$headerAndNavbar}
    <article>
      <section>
        <h1>{$blogTitle}</h1>
      </section>
      <section>
        <div class="articleView">{$blogText}</div>
      </section>
    </article>
    <aside>
      <section>
        <h1>カテゴリー</h1>
        <ul>
          <li><a href="#">カテゴリー1</a></li>
          <li><a href="#">カテゴリー1</a></li>
          <li><a href="#">カテゴリー1</a></li>
          <li><a href="#">カテゴリー1</a></li>
          <li><a href="#">カテゴリー1</a></li>
        </ul>
      </section>
      <section>
        <h1>アーカイブ</h1>
        <ul>
          <li><a href="#">アーカイブ1</a></li>
          <li><a href="#">アーカイブ2</a></li>
          <li><a href="#">アーカイブ3</a></li>
          <li><a href="#">アーカイブ4</a></li>
          <li><a href="#">アーカイブ5</a></li>
        </ul>
      </section>
    </aside>
    {$footer} {$js} {$css}
  </body>
</html>
