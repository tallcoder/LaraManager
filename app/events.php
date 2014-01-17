<?php

Event::listen('project.create', function(Project $project) {
   //first we need to get the email address
   $email = User::find($project->user());

    foreach(User::staff()->get() as $u)
    {
        $e = $u::$u->email;
        mail($e, "New Project", "A new project was created!", "From: LaraManager <noreply@icwebdev.com");
    }

    foreach(User::admin()->get() as $u)
    {
        $e = $u::$u->email;
        mail($e, "New Project", "A new project was created!", "From: LaraManager <noreply@icwebdev.com");
    }


});

Event::listen('task.create', function($task) {

});

Event::listen('project.change', function($project) {

});

Event::listen('task.change', function($task) {

});

?>
