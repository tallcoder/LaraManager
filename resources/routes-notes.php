<?

/*notes

routing basics

app/routes.php

 //Route::get could also be Route::push ::delete ::any etc


*/
/*

we could also set a default for $genre like this:
Route::get('/books/{genre?}', function($genre = "crime") { //do code here});
 */

Route::get('/{squirrel?}', function($squirrel = null) {
	if($squirrel == null) {
		return 'books index page';
	}

	else {
		return "books in the {$squirrel} category";
	}
});

/*
View::make('someview') will return the someview.php file from app/views/ which should have the HTML/blade stuffs
 */


Route::get('/a/{squirrel?}', function($squirrel = null) {

	if($squirrel == null) {
		return View::make('movie_index');
	}

	else {
		return View::make('squirrel');
	}
});

/*
next we can add in some basic data passing
 */

Route::get('/b/{squirrel}', function($squirrel) {
	$data['animal'] = "squirrel";
	$data['color'] = "brown";

	return View::make('squirrel', $data);
});

/*
mix in some arrays:
 */

Route::get('/c/{squirrel}', function($squirrel) {
	$data = array(
		'animal' => 'squirrel',
		'color' => 'brown'
		);

	return View::make('squirrel', $data);
});

/* what if we want to redirect a page? */

Route::get('/e/{squirrel}', function($squirrel) {
	return Redirect::to('/b/squirrel');
});

/*what if we want to use the symfony response object API? */

Route::get('/f/{squirrel}', function() {
	$r = Respone::make('squirrel'); //takes status code as second param
	//these are just samples
	$r->setTtl(60); //sets "useful" time in seconds
	$r->setStatusCode(200); //sets the 200 "ok" code
	$r->setCharset("UTF-8"); //sets the charset
	return $r;
});


/* useful for building JSON APIs? */
Route::get('/g/{squirrel}', function() {
	$data = array('iron','titanium','zinc','tungsten');
	return Response::json($data);
});

/*downloading a file*/
Route::get('/h/{squirrel}', function() {
	$file = "path/to/file.pdf";
	return Response::download($file);
});

/*what if we want to run a filter first?
* just remember, after is pretty useless except for cleanup or logging
* you can use multiple filters, just remember to separate with a pipe & they execute L->R
* you can also pass an array of filters
*/
Route::get('/', array(
	'before' => 'birthday|christmas|easter',
	'after'  => array('anotherfilter','uselessfilter'), 
	function() {
		return View::make('hello');
	}
	));

//if birthday takes 1 param:*/
Route::get('/', array(
	'before' => 'birthday:12/12',
	function() {
		return View::make('hello');
	}
	));

//if birthday takes 3 params:
//eg filter('birthday', function($route, $request, $date, $gender, $name))
//
Route::get('/', array(
	'before' => 'birthday:12/12, male, john',
	function() {
		return View::make('hello');
	}
	));

//creates an alias for birthday that points to BirthdayFilter
Route::filter('birthday','BirthdayFilter');
//after this alias has been created, you can keep using the filter just like before

/*instead of using a closure, we can reference a method of the ArticleController separate by the @ symbol */
Route::get('index','ArticleController@showIndex');

/*and of course we can always call a namespaced controller*/
Route::get('index','Blog\Controller\Article@showIndex');

//lets abbreviate a long uri path
Route::get('some/long/uri/calendar', array (
	'as' => 'caldendar',
	function() {
		return view::make('calendar');
	}
	));
//and return the current route nickname
$current = Route::currentRouteName();

//you can name the closures too
Route::get('some/long/uri/calendar', array (
	'as' => 'calendar',
	'uses' => 'CalendarController@showCalendar'
	));



//security stuffs
//adding the https index makes the route respond using HTTPS
Route::get('secret/content', array(
	'https',
	function() {
		return 'the secret squirrel';
	}
	));

//adding some parameter constraints with regular expressions
Route::get('save/{princess}', function($princess) {
	return "Sorry, {$princess} is in another castle. :(";
})->where('princess', '[A-Za-z]}');

//hmmm a second param that maatches a second regex
Route::get('save/{princess}/{$unicorn}', function($princess, $unicorn) {
	return "Sorry, {$princess} is in another castle. :(";
})->where('princess', '[A-Za-z]}')
  ->where('unicorn', '[0-9]+');

//grouping routes together
Route::group(array('before' => 'onlybrogrammers'), function(){
	//first route
	Route::get('/first', function() {
		return "Dude!";
	});
	//second route
	Route::get('/second', function() {
		return "Duuude!";
	});
	//third route
	Route::get('/third', function() {
		return "Duuuuuude!";
	});
});

//grouping allows prefixes to be assigned (DRY things up a little)
//would hit on /books/first /books/second /books/third
Route::group(array('prefix' => 'books'), function() {
	//first
	Route::get('/first', function() {
		return "The First Book";
	});
	//second
	Route::get('/second', function() {
		return "The Second Book";
	});
	//third
	Route::get('/third', function() {
		return "The Third Book";
	});
});

//we can even target subdomains using grouping!
Route::group(array('domain' => 'something.dev'), function() {
	Route::get('my/route', function() {
		return "Hello from something.dev/my/route";
	});
});

//of course we can use parameters in subdomain names as well
Route::gropu(array('domain' => '{user}.something.dev'), function() {
	Route::get('profile/{page}', function($user, $page) {
		//....something
	});
});

/*
* generating urls...cuz everyone needs links!
* 
 */
Route::get('/current/url', function() {
	return URL::current();
});

//this one returns the full URL, fx with get data
//fx it would return http://laravel.icwebdev.com/current/url?foo=bar
Route::get('/current/url', function() {
	return URL::full();
});

//returning a URL to a different URI
Route::get('example', function() {
	return URL::to('another/route');
	//it also takes parameters
	return URL::to('another/route', array('foo','bar'));
	//this would return /another/route/foo/bar
	//the following will return an HTTPS URL
	return URL::to('another/route', array('foo','bar'), true);
});




?>