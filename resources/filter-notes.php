<?php

/* notes

/// filter basics

/*custom filters*/
/*remember:
*	before filters take $route, $request as params
*	after filters take $route, $request, $response as params
*/
//single param
Route::filter('birthday1', function($route, $request, $date) {
	if(date('d/m') == $date) {
		return View::make('birthday');
	}
});

//3 params
Route::filter('birthday3', function($route, $request, $date, $gender, $name) {
	if(date('d/m') == $date) {
		$data = array(
			'birthday' => $date,
			'gender' => $gender,
			'name' => $name
			);
		return View::make('birthday', $data);
	}
});

?>