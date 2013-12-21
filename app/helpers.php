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