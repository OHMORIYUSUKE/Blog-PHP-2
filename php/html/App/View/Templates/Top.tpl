<!DOCTYPE html>
<html lang="ja">
  <head>
    {$head}
  </head>
  <body>
    {$headerAndNavbar}
    <article>
      <p>記事 : {$postCount} 件</p>
      {foreach from=$postArray item=post}
      <section>
        <a href="article/{$post.id}"><h1>{$post.title}</h1></a>
      </section>
      {/foreach}
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            {if $page > 1}
            <li class="page-item">
              &laquo;<a href="/{$page - 1}"><span aria-hidden="true">前のページへ</span></a>
            </li>
            {else}
            <li class="page-item">
              <span aria-hidden="true">　　　　　　</span>
            </li>
            {/if}
              <li class="page-item">
                {$page} / {$maxPage}
              </li>
            {if $page < $maxPage}
            <li class="page-item">
              <a href="/{$page + 1}"><span aria-hidden="true">次のページへ</span></a>&raquo;
            </li>
            {else}
            <li class="page-item">
              <span aria-hidden="true">　　　　　　</span>
            </li>
            {/if}
          </ul>
        </nav>
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
