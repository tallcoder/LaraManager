<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace {
/**
 * An Eloquent Model: 'User'
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $usertype
 * @property integer $userperms
 * @property string $phone
 * @property string $expires
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Project[] $projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasksCreated
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasksAssigned
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasksCompleted
 * @method static User staff() 
 * @method static User admin() 
 * @method static User client() 
 */
	class User {}
}

namespace {
/**
 * An Eloquent Model: 'Comment'
 *
 * @property integer $id
 * @property string $type
 * @property integer $parent
 * @property string $description
 * @property integer $user_id
 * @property boolean $staffonly
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 * @method static Comment projectComments($p) 
 * @method static Comment taskComments($t) 
 * @method static Comment listComments($l) 
 * @method static Comment commentsByUser($u) 
 * @method static Comment commentsByParent($p) 
 * @method static Comment commentsByType($t = 'comment') 
 */
	class Comment {}
}

namespace {
/**
 * An Eloquent Model: 'Project'
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property integer $budget_used
 * @property integer $budget_total
 * @property boolean $completed
 * @property boolean $staffonly
 * @property string $begin_date
 * @property string $end_date
 * @property string $due_date
 * @property string $description
 * @property string $url
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tasklist[] $tasklists
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Upload[] $uploads
 * @method static Project publicProjects() 
 */
	class Project {}
}

namespace {
/**
 * An Eloquent Model: 'Tasklist'
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property boolean $staffonly
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 */
	class Tasklist {}
}

namespace {
/**
 * An Eloquent Model: 'BaseModel'
 *
 */
	class BaseModel {}
}

namespace {
/**
 * An Eloquent Model: 'Upload'
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property float $size
 * @property integer $created_by
 * @property boolean $staffonly
 * @property string $parent_type
 * @property integer $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
	class Upload {}
}

namespace {
/**
 * An Eloquent Model: 'Task'
 *
 * @property integer $id
 * @property string $name
 * @property integer $list_id
 * @property integer $project_id
 * @property integer $created_by
 * @property integer $assigned_to
 * @property integer $completed_by
 * @property boolean $staffonly
 * @property boolean $completed
 * @property float $time
 * @property string $type
 * @property integer $budget_total
 * @property integer $budget_used
 * @property string $begin_date
 * @property string $end_date
 * @property string $due_date
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Tasklist $tasklist
 * @property-read \User $createdBy
 * @property-read \User $assignedTo
 * @property-read \User $completedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @property-read \Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\Upload[] $uploads
 * @method static Task assignedTo($id) 
 * @method static Task createdBy($id) 
 * @method static Task completedBy($id) 
 * @method static Task totalBudgetUnder($b) 
 * @method static Task totalBudgetOver($b) 
 * @method static Task usedBudgetUnder($b) 
 * @method static Task usedBudgetOver($b) 
 * @method static Task list($id) 
 */
	class Task {}
}

