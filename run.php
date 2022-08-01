<?php
require_once './meta.php';

@$username = $_GET['username'];
@$password = $_GET['password'];

if ( empty($username) || empty($password) ) {
	die("no provide username and password.");
	exit;
}

function is_valid($str) {
	$allow_chars = str_split('qazwsxedcrfvtgbyhnujmikolpQAZWSXEDCRFVTGBYHNUJMIKOLP1234567890.-_', 1);
	$str = str_split($str, 1);

	foreach ($str as $it) {
		foreach ($allow_chars as $c) {
			if ($it == $c) {
				goto ok;
			}
		}

		err:
		return false;

		ok:
		// do nothing

	}

	return true;
}

if ( (!is_valid($username)) || (!is_valid($password)) ) {
	die("username or password is invalid, only 0~9 and a~z and A~Z is allowed.");
	exit;
}

@$exit = $_GET['exit'];
if ( empty($exit) ) {
	$exit = "ca-mtl-02.exits.geph.io";
}

if( !is_valid($exit) ) {
	die("exit is invalid.");
	exit;
}

exec("bash ./geph4-client.sh connect --username $username --password $password --exit-server $exit");

