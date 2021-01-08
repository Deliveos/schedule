<?php
require_once 'secure.php';
$size = 20;
$userMap = new UserMap();
if (isset($_GET['page'])) {
  $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
  //$userMap = new UserMap();
  $userMap = new UserMap();
  $role_id = $_POST["role_id"];
  //$userMap->count();
  $users = $userMap->findAllByRole($role_id, $page*$size-$size, $size);
  $count = count($users);
  //$userMap->findAll($page*$size-$size, $size);
  $header = 'Список пользователей';
  require_once 'template/header.php';
  ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <section class="content-header">
          <h1>Список пользователей</h1>
          <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список пользователей</li>
          </ol>
        </section>
        <div class="box-body">
          <a class="btn btn-success" href="add-user.php">Добавить пользователя</a>
        </div>

        <form name='frm' action='' method='post' >
          <select class="form-control" name="role_id" onChange="document.frm.submit();">
          <option value="0" <?= ($role_id === 0) ? "selected" : ""; ?> >Все</option>
            <?
            $roles = $userMap->arrRoles();
            foreach($roles as $role) {?>
              <option value="<?=$role['id'];?>" <?= ($role_id === $role["id"]) ? "selected" : ""; ?> ><?= $role['value'];?></option>
            <? } ?>
          </select> 
        </form>
        
        <!-- /.box-header -->
        <div class="box-body">
  <?php
    if ($users) {
  ?>
  <table id="example2" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Ф.И.О</th>
        <th>Пол</th>
        <th>Дата рождения</th>
        <th>Отделение</th>
        <th>Роль</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($users as $user) {
        echo '<tr>';
        echo '<td><a href="profile-user.php?id='.$user->user_id.'">'.$user->fio.'</a> '
        . '<a href="add-user.php?id='.$user->user_id.'"><i class="fa fa-pencil"></i></a></td>';
        echo '<td>'.$user->gender.'</td>';
        echo '<td>'.$user->birthday.'</td>';
        echo '<td>'.$user->otdel.'</td>';
        echo '<td>'.$user->role.'</td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
<?php } else {
echo 'Ни одного пользователя с данной ролью не найдено';
} ?>
        </div>
        <div class="box-body">
          <?php Helper::paginator($count, $page, $size); ?>
        </div>
<!-- /.box-body -->
      </div>
    </div>
  </div>
<?php require_once 'template/footer.php'; echo $role_id; ?>
