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
            &laquo;<a href="/{$page - 1}"
              ><span aria-hidden="true">前のページへ</span></a
            >
          </li>
          {else}
          <li class="page-item">
            <span aria-hidden="true">　　　　　　</span>
          </li>
          {/if}
          <li class="page-item">{$page} / {$maxPage}</li>
          {if $page < $maxPage}
          <li class="page-item">
            <a href="/{$page + 1}"
              ><span aria-hidden="true">次のページへ</span></a
            >&raquo;
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
        <hr />
        {foreach from=$postTags item=post}
        <a href="/tag/{$post}">#{$post}</a>
        {/foreach}
      </section>
      <section>
        <h1>最新記事</h1>
        <hr />
        {foreach from=$recentPosts item=post}
        <a href="/article/{$post.id}">{$post.title}</a><br />
        {/foreach}
      </section>
      <section>
        <h1>人気記事</h1>
        <hr />
        {foreach from=$popularPosts item=post}
        <a href="/article/{$post.id}">{$post.title}</a><br />
        {/foreach}
      </section>
      <section>
        <h1>アーカイブ</h1>
        <hr />
        {foreach from=$postsArchive item=post}
        <a href="/archive/{$post}">{$post}</a><br />
        {/foreach}
      </section>
    </aside>
    {$footer} {$js} {$css}
  </body>
</html>
