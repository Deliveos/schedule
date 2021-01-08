<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li
        <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"' : '';?>>
        <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
      </li>
      <li class="header">Пользователи</li>
        <li <?=($_SERVER['PHP_SELF']=='/list-user.php')?'class="active"':'';?>>
        <a href="list-user.php"><i class="fa fa-users"></i><span>Пользователи</span></a>
      </li>
    </ul>
  </section>
</aside>