<?php
require_once 'secure.php';
if (isset($_POST['user_id']) and $_POST['birthday'] !== '') {
  $userMap = new UserMap();
  $user = new User();
  $user->lastname = Helper::clearString($_POST['lastname']);
  $user->user_id = Helper::clearInt($_POST['user_id']);
  $user->firstname = Helper::clearString($_POST['firstname']);
  $user->patronymic = Helper::clearString($_POST['patronymic']);
  $user->birthday = Helper::clearString($_POST['birthday']);
  $user->login = Helper::clearString($_POST['login']);
  $user->pass = password_hash(Helper::clearString($_POST['password']), PASSWORD_BCRYPT);
  $user->gender_id = Helper::clearInt($_POST['gender_id']);
  $user->role_id = Helper::clearInt($_POST['role_id']);
  $user->active = Helper::clearInt($_POST['active']);
  $userMap->save($user);
  if (isset($_POST['saveUser'])) {
    if ($_POST["role_id"] == 3) {
      $teacher = new Teacher();
      $teacher->otdel_id = Helper::clearInt($_POST['otdel_id']);
      $teacher->user_id = $user->user_id;
      if ((new TeacherMap())->save($user, $teacher)) {
        header('Location: profile-user.php?id='.$teacher->user_id);
      } else {
        if ($teacher->user_id) {
        header('Location: add-user.php?id='.$teacher->user_id);
        } else {
          header('Location: add-user.php');
        }
      }
    } elseif ($_POST["role_id"] == 4) {
      $student = new Student();
      $student->gruppa_id = Helper::clearInt($_POST['gruppa_id']);
      $student->user_id = $user->user_id;
      $student->num_zach = Helper::clearString($_POST["num_zach"]);
      if ((new StudentMap())->save($user, $student)) {
        header('Location: profile-user.php?id='.$teacher->user_id);
      } else {
        if ($user->user_id) {
        header('Location: add-user.php?id='.$user->user_id);
        } else {
          header('Location: add-user.php');
        }
      }
    }
    
    exit();
  }
}