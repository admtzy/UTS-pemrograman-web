<?php
require_once 'controllers/Controller.php';

class AuthController extends Controller {
  private $userModel;

  public function __construct() {
    $this->userModel = $this->model('User');
    session_start();
  }

  public function register() {
    $this->view('tampilan', ['mode' => 'register']);
  }

  public function simpanRegister() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user';
    $this->userModel->register($username, $password, $role);
    header("Location: index.php?url=auth/login");
    exit;
  }

  public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $user = $this->userModel->getUser($username);

      if ($user && $password === $user['password']) {
        $_SESSION['user'] = $user;
        if (strtolower($user['role']) === 'admin') {
          header("Location: index.php?url=warga/data");
        } else {
          header("Location: index.php?url=warga/form");
        }
        exit;
      } else {
        $this->view('tampilan', ['mode' => 'login', 'error' => 'Username atau password salah!']);
      }
    } else {
      $this->view('tampilan', ['mode' => 'login']);
    }
  }

  public function logout() {
    session_destroy();
    header("Location: index.php?url=auth/login");
    exit;
  }
}
?>
