<?php
class StudentMap extends BaseMap {
  
  private function insert(Student $student) {
    if ($this->db->exec("INSERT INTO student(user_id, gruppa_id, num_zach) VALUES($student->user_id, $student->gruppa_id, $student->num_zach)") == 1) {
      return true;
    }
    return false;
  }

  private function update(Student $student) {
    if ($this->db->exec("UPDATE student SET gruppa_id = $student->gruppa_id, num_zach = $student->num_zach WHERE user_id=".$student->user_id) == 1) {
      return true;
    }
    return false;
  }

  public function save(User $user, Student $student) {
    if ($user->validate() && $student->validate() && (new UserMap())->save($user)) {
      if ($student->user_id == 0) {
        $student->user_id = $user->user_id;
          return $this->insert($student);
      } else {
        return $this->update($student);
      }
    }
    return false;
  }
}