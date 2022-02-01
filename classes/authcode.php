<?php

/*
MADE BY SAMUEL TRNKA
GENERATES STRING BASED ON LENGHT SENT TO FUNCTION WHEN CALLED
*/
function authCode($length = 10)
{
  /* REG EX TO DEFINE SYMBOLS USED IN PASSWORD GENERATION */
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  /* THIS CHECKS FOR LENGHT OF REGEX DUE TO GIVING RANDOM POSITION IN FOR LOOP */
  $charactersLength = strlen($characters);

  $randomString = '';

  /* FOR LOOP TO GENERATE STRING BASED ON INPUTTED LENGHT AND RANDOMNESS */
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }

  return $randomString;
}
