<?php 
$projectsfile = simplexml_load_file('bos/molds/ports/module/data/projects.xml');
$rolesfile = simplexml_load_file('bos/molds/ports/module/data/roles.xml');
$taskfile = simplexml_load_file('bos/molds/ports/module/data/tasks.xml');

/* PROJECTS */
$project_list = '';
if($projectsfile->project->count()<=0){$projects_table .= '<p><strong>[NO PROJECTS]</strong></p>';}else{ 
	$project_list .= '<div class="project-list">'.PHP_EOL;
	foreach($projectsfile->project as $project){ 
		/* define project variables */
		$title = $project['title'];
		$description = $project->description;
		$owner = $project['owner'];
		$deadline = $project->deadline;
		$priority = $project->priority;
		$status = $project->status;
		$progress = $project->status['progress'];
		
		$project_list .= '<details class="project"><summary>'.$title.'</summary>'.PHP_EOL;
		$project_list .= '<p class="details"><strong>Owner:</strong> '.$owner.'<br /><strong>Due:</strong> '.$deadline.'<br /><strong>Priority:</strong> '.$priority.'<br />';
		$project_list .= '<strong>Status:</strong> '.$status.'<br /><strong>Progress:</strong> '.$progress.'% complete</p>'.PHP_EOL;
		$project_list .= '<p class="description">'.$description.'</p>'.PHP_EOL;
		$project_list .= '</details>'.PHP_EOL;
	}
	$project_list .= '</div>'.PHP_EOL;
}

/* ROLES */
$roles_list = '';
if($rolesfile->role->count()<=0){$roles_table .= '<p><strong>[NO ROLES]</strong></p>';}else{
	$roles_list .= '<div class="roles-list">'.PHP_EOL;
	foreach($rolesfile->role as $role){
		/* define roles variables */
		$title = $role['title'];
		$description = $role->description;
		$owner = $role['user'];
		$status = $role['status'];
		
		$roles_list .= '<details class="role"><summary>'.$title.'</summary>'.PHP_EOL;
		$roles_list .= '<p class="details"><strong>Owner:</strong> '.$owner.'<br /><strong>Status:</strong> '.$status.'</p>';
		$roles_list .= '<p class="description">'.$description.'</p>'.PHP_EOL;
		$roles_list .= '</details>'.PHP_EOL;
	}
	$roles_list .= '</div>'.PHP_EOL;
}

/* TASKS */
$task_list = '';
if($taskfile->task->count()<=0){$simple_task_list .= '<p><strong>[NO TASKS]</strong></p>';}else{ 
	$task_list .= '<div class="task-list">'.PHP_EOL;
	foreach($taskfile->task as $task){
		/* define task variables */
		$title = $task['title'];
		$description = $task->description;
		$owner = $task['owner'];
		$priority = $task->priority;
		$status = $task->status;
		$deadline = $task->deadline;
		
		$task_list .= '<details class="task"><summary>'.$title.'</summary>'.PHP_EOL;
		$task_list .= '<p class="details"><strong>Owner:</strong> '.$owner.'<br /><strong>Due:</strong> '.$deadline.'<br />';
		$task_list .= '<strong>Priority:</strong> '.$priority.'<br /><strong>Status:</strong> '.$status.'</p>'.PHP_EOL;
		$task_list .= '<p class="description">'.$description.'</p>'.PHP_EOL;
		$task_list .= '</details>'.PHP_EOL;
	}
	$task_list .= '</div'.PHP_EOL;
}
?>