<?php

function is_logged()
{
  if (isset($_SESSION['user_login'])) {
    return true;
  } else {
    return false;
  }
}
