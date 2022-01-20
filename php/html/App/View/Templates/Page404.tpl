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
        <hr />
        {foreach from=$postTags item=post}
        <a href="/tag/{$post}/1">#{$post}</a>
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
        <a href="/archive/{$post}/1">{$post}</a><br />
        {/foreach}
      </section>
    </aside>
    {$footer} {$js} {$css}
  </body>
</html>
