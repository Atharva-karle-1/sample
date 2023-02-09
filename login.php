<?php
      session_start();
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        header('Location: home.php');
        exit;
      }
      if (isset($_POST['submit'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if ($username === 'admin' && password_verify($password, '$2y$10$3IYiLZGjLq.cqX9QMfEogeKjRU1bPyOsKjXkLsxmldtLsqmdLmIF2')) {
          $_SESSION['logged_in'] = true;
          header('Location: home.php');
          exit;
        } else {
          echo '<p style="color: red; text-align: center;">Incorrect username or password</p>';
        }
      }
    ?>
    