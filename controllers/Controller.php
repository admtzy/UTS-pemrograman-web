<?php
class Controller {
  public function model($model) {
    require_once "models/$model.php";
    return new $model;
  }

  public function view($view, $data = []) {
    extract($data);
    require "views/layout/header.php";
    require "views/layout/navbar.php";
    require "views/$view.php";
    require "views/layout/footer.php";
  }
}
?>
