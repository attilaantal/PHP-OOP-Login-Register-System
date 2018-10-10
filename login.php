<?php
/**
 * Created by Chris on 9/29/2014 3:52 PM.
 */

require_once 'core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login) {
                Redirect::to('index.php');
            } else {
                echo '<p>Incorrect username or password</p>';
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for='username'>Username</label>
        <input type="text" name="username" id="username">
    </div>

    <div class="field">
        <label for='password'>Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="remember">
            <input type="checkbox" name="remember" id="remember">Remember me
        </label>
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Login">
</form>