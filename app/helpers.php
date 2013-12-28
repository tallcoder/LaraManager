<?php

/*
 * this class has some general helper functions for doing this that and the other
 */

function getMdy($date) {
	return date("m-d-Y", strtotime($date));
}

function getTime($date) {
	return date('g:ia', strtotime($date));
}

function getMdyTime($date) {
	return date('m-d-Y g:ia', strtotime($date));
}

/*
 * return a formatted array of mail to headers
 *
 * @param array users
 * @return array mail headers
 */

function getMailTo(Array $users) {
    $t = array();
    foreach($users as $u) {
        $t[] = $u->first_name . " " . $u->last_name . " " . "<" . $u->email . ">";
    }

    return $t;
}

function updateProjectUsers($uid) {
	$projects = Project::all()->where('user_id', '=', $uid);
	foreach($projects as $p) {
		$p->user_id = 0;
		$p->save();
	}
}