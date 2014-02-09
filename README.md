LaraManager
==========

Open source project manager built on Laravel

<h3>The Project (manager)</h3>

There's a lot of project managers out there - some built with PHP, some built with Ruby on Rails, some very simple, some incredibly complex.

Having perused, installed, and tried out a lot of these project managers, I saw a lot of things I did and didn't like. Redmine is probably the most popular one out there, it is very full featured and quite complex. Others offer a nice UI, but lack key features that I look for in a project manager.

Utlimately, I decided to build one of my own. I'm a programmer, right? I did my research, tried a couple things out, and here it is today.

<h3>The Application</h3>
LaraManager is built on the Laravel 4 PHP framework (specifically, 4.1). Quite true to to the rumor, Laravel makes writing code more intuitive and fun.

Below is brief overview of the current feature set:

* Project -> task hierarchy with optional task lists
* Simple user authorization system - you're either a client, staff, or admin
* Subscription system built on a per task and per project basis
* Built in time tracker for tasks
* Built in budget tracking (total/used/remaining)
* Project and task deadlines along with recordings of start and finish dates
* File attachments
* Comment system for tasks

See the bottom of the page for the roadmap of in-progress and down the road features (aka roadmap).

<h3>Contributing</h3>
Since this has pretty much been a one-man show so far, there's plenty of stuff to be done. Public enemy #1 is currently front end stuff - LaraManager needs some TLC on the CSS and layouts. There's plenty of back end work available as well.

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
<li>`composer create-project laravel/laravel laramanager --prefer-dist`</li>
<li>`cd laramanager`</li>
<li>`git remote add origin https://github.com/mjdugan14/LaraManager.git`</li>
<li>`git fetch --all && git reset --hard origin/master`</li>
<li>`composer update`</li>
<li>`mysql -u user -pppassword -e 'create database lara;'
<li>`php artisan migrate`</li>
</ul>

You can then set up an Apache virtual host or use `php artisan serve` to test the application.

<h2>Roadmap</h2>
<h3>In Progress</h3>
These are features that I am currently working on implementing or will be working on super short term:
* Custom Ajax controller to handle client side requests
* Events system to handle sending out user notifications
* More dependence on ajax functions to reduce unnecessary page loads
<h3>Short Term</h3>
Tasks that I'm not working on right now, but will be within the next month or two:
* Sortable tables in the various views (partially implemented)
* Search and filter functionality
* New implementation of user creation/registration ( invitation-based replacing manual user creation )
* Allow admin to set rates for design/programming work
<h3>Long Term</h3>
Tasks that I haven't set a time frame on, but are going to be done at some point:
* Merging show/edit views into a single view
* Automagically generated reports for projects ( cost/time analysis, etc )
* GitHub integration
