<?php
/**
 * Created by Chris on 9/29/2014 3:42 PM.
 */

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
?>

    <p>Hello, <a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></p>

    <ul>
        <li><a href="update.php">Update Profile</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
<?php

    if($user->hasPermission('admin')) {
        echo '<p>You are a Administrator!</p>';
    }

} else {
    echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register.</a></p>';
}