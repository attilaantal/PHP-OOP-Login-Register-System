<?php
/**
 * Created by Chris on 9/29/2014 3:55 PM.
 */

class Redirect {
    public static function to($location = null) {
        if($location) {
            if(is_numeric($location)) {
                switch($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        break;
                }
            }
            header('Location: '. $location);
            exit();
        }
    }
}