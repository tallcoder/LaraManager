<?php

/*
 * gets a standard formatted date ie 6/12/1990
 * @param $date datestring
 * @return date object
 */
function getMdy($date) {
	return date("m-d-Y", strtotime($date));
}

/*
 * gets a standard formatted time ie 8:42pm
 * @param $date datestring
 * @return date object
 */
function getTime($date) {
	return date('g:ia', strtotime($date));
}

/*
 * gets a fully formatted date and time
 * @param $date datestring
 * @return date object
 */
function getMdyTime($date) {
	return date('m-d-Y g:ia', strtotime($date));
}

/*
 * truncates a string and adds ellipses at the end
 * @param $str string
 * @return string
 */
function ellipsify($str)
{
	return substr($str, 0, 40) . "...";
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