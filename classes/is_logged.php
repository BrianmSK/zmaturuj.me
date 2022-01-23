<?php

function is_logged()
{
  if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    return true;
  } else {
    return false;
  }
}
