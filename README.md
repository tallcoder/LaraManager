LaraManager
==========

Open source project manager built on Laravel

<h3>The Project (manager)</h3>

There's a lot of project managers out there - some built with PHP, some built with Ruby on Rails, some very simple, some incredibly complex.

Having perused, installed, and tried out a lot of these project managers, I saw a lot of things I did and didn't like. Redmine is probably the most popular one out there, it is very full featured and quite complex. Others offer a nice UI, but lack key features that I look for in a project manager.

Utlimately, I decided to build one of my own. I'm a programmer, right? I did my research, tried a couple things out, and here it is today.

<h3>The Application</h3>
LaraManager is built on the Laravel 4 PHP framework (specifically, 4.1). RESTful routing and the Eloquent ORM make life a lot easier - and I don't like writing SQL queries. 
On the front end, there isn't much there right now...I'm only one guy! Going down the road, styling will most likely be pre-processed with less,
and scripting side stuff handled with jQuery. 

<h3>Contributing</h3>
I am 100% looking for someone to help with this project. Another core Laravel programmer would be nice, as would a front-end guy or gal to work with the Blade templates, styling, and JavaScript.
If you're interested, feel free to <a href="mailto:mike@mjdugan.com?subject=laramanager">email me</a>. 

<h3>Installation</h3>
Long Story Short: If you're already familiar with Laravel, simply install it, clone this repo over top of your root directory, and run `php composer update`

<h4><i>Developing Locally</i></h3>

I do most of my development locally, and then push to a development server. At home I develop on Mac OS X Mavericks, at work it is on Xubuntu 13.10.

<i>Installing Composer</i>

These instructions are pretty much the same for Linux and OS X. If you run Windows, go on a google search :)
<ul>
<li>`curl -sS https://getcomposer.org/installer | php`</li>
<li>`sudo mv composer.phar /usr/bin/composer`</li>
<li>`composer create-project laravel/laravel promanager --prefer-dist`</li>
<li>`cd promanager`</li>
<li>`git remote add origin https://github.com/mjdugan14/LaraManager.git`</li>
<li>`git fetch --all`</li>
<li>`git reset --hard origin/master`</li>
<li>`composer update`</li>
</ul>

You can then set up an Apache virtual host or use `php artisan serve` to test the application.
