<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li
        <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"' : '';?>>
        <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
      </li>
      <li class="header">Пользователи</li>
        <li 
          <?=($_SERVER['PHP_SELF']=='/list-user.php')?'class="active"':'';?>>
          <a href="list-user.php"><i class="fa fa-users"></i><span>Пользователи</span></a>
        </li>
      <li class="header">Справочники</li>
        <li 
          <?=($_SERVER['PHP_SELF']=='/list-gruppa.php')?'class="active"':'';?>>
          <a href="list-gruppa.php"><i class="fa fa-book"></i><span>Группы</span></a>
        </li>
        <li 
          <?=($_SERVER['PHP_SELF']=='/list-otdel.php')?'class="active"':'';?>>
          <a href="list-otdel.php"><i class="fa fa-book"></i><span>Отделения</span></a>
        </li>
        <li 
          <?=($_SERVER['PHP_SELF']=='/list-special.php')?'class="active"':'';?>>
          <a href="list-special.php"><i class="fa fa-book"></i><span>Специальности</span></a>
        </li>
        <li 
          <?=($_SERVER['PHP_SELF']=='/list-subject.php')?'class="active"':'';?>>
          <a href="list-subject.php"><i class="fa fa-book"></i><span>Предметы</span></a>
        </li>
        <li 
          <?=($_SERVER['PHP_SELF']=='/list-classroom.php')?'class="active"':'';?>>
          <a href="list-classroom.php"><i class="fa fa-book"></i><span>Аудитории</span></a>
        </li>
    </ul>
  </section>
</aside>