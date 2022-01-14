<?php
/* Smarty version 4.0.3, created on 2022-01-14 19:40:28
  from 'C:\xampp\htdocs\html\Blog-PHP-2\App\View\Templates\View.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.3',
  'unifunc' => 'content_61e1531c4ada23_78901009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d72076efeb0d5a066a8461c31a498f4c791c2fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\Blog-PHP-2\\App\\View\\Templates\\View.tpl',
      1 => 1642155769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e1531c4ada23_78901009 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
  <head>
    <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

  </head>

  <body>
    <?php echo $_smarty_tpl->tpl_vars['headerAndNavbar']->value;?>

    <article>
      <section>
        <h1><?php echo $_smarty_tpl->tpl_vars['blogTitle']->value;?>
</h1>
      </section>
      <section>
        <div class="articleView"><?php echo $_smarty_tpl->tpl_vars['blogText']->value;?>
</div>
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
    <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['js']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

  </body>
</html>
<?php }
}
