<?php

namespace App\Services;

class CheckFormData {
  public static function checkGender($data) {
    switch ($data->gender) {
      case 0:
          $data->gender = '男性';
          break;
      case 1:
          $data->gender = '女性';
          break;
    }
  }
  public static function checkAge($data) {
    switch ($data->age) {
      case 1:
          $data->age = "~19歳";
          break;
      case 2:
          $data->age = "19歳~29歳";
          break;
      case 3:
          $data->age = "29歳~39歳";
          break;
      case 4:
          $data->age = "39歳~49歳";
          break;
      case 5:
          $data->age = "49歳~59歳";
          break;
      case 6:
          $data->age = "60歳~";
          break;
    }
  }
}

?>