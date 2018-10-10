<?php
/**
 * Created by Chris on 9/29/2014 3:59 PM.
 */

require_once 'core/init.php';

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}