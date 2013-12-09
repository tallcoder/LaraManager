<?php

/*
*	notes
*	controller basics
 */

// controller classes should go in the app/controllers directory
// a basic one targeted for a blog

class ArticleController extends BaseController {
	public function showIndex() {
		return View::make('index');
	}

	public function showSingle($articleId) {
		return View::make('single');
	}
}

?>

<?php

/*or we could namespace the class... */

namespace Blog\Controller;

use View;
use BaseController;

class Article extends BaseController {
	public function showIndex() {
		return View::make('index');
	}

	public function showSingle($articleId) {
		return View::make('single');
	}
}

?>