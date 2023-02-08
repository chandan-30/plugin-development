<?php 
/**
  * This callback function runs third when init action is executed, it's priority collided with another..
  * callback function but this comes first in execution flow
  */
function callback_late() {
    echo "this function runs third</br>";
}

/**
  * This callback function runs second when init action is executed, it has default priority value of 10
  */
function callback_normal() {
    echo "this function runs second</br>";
}

/**
  * This callback function runs first when init action is executed, it has priority value of 9
  */
function callback_early() {
    echo "this function runs first</br>";
}

/**
  * This callback function runs at last when init action is executed, it has priority is collided with another..
  * callback function but comes last in execution flow.
  */
function callback_lately() {
    echo "this function runs at last";
}

//Hooking callbacks to the 'init' action hook
add_action('init','callback_late',11);
add_action('init','callback_normal');
add_action('init','callback_early',9);
add_action('init','callback_lately',11);

?>