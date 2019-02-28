<?php
//get tasklist array from POST
$task_list = filter_input(
    INPUT_POST,
    'tasklist',
    FILTER_DEFAULT,
    FILTER_REQUIRE_ARRAY
);
if ($task_list === null) {
    $task_list = array();

    //    add some hard-coded starting values to make testing easier
    //    $task_list[] = 'Write chapter';
    //    $task_list[] = 'Edit chapter';
    //    $task_list[] = 'Proofread chapter';
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch ($action) {
    case 'Add Task':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            //$task_list[] = $new_task;
            array_push($task_list, $new_task);
        }
        break;
    case 'Delete Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === null || $task_index === false) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;
    case 'Modify Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === null || $task_index === false) {
            $errors[] = 'There was an error modifying the task';
        } else {
            $task_to_modify = $task_list[$task_index];
        }

        break;
    case 'Save Changes':
        $modified_task_id = filter_input(INPUT_POST, 'modifiedtaskid', FILTER_VALIDATE_INT);
        $modified_task = filter_input(INPUT_POST, 'modifiedtask');

        if (empty($modified_task)) {
            // $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
            if ($modified_task_id === null || $modified_task_id === false || empty($modified_task)) {
                unset($task_list[$modified_task_id]);
                $task_list = array_values($task_list);
            } else {

            }
        } elseif ($modified_task_id === null || $modified_task === false) {
            $errors[] = 'That was not a valid choice';
        } else {
            $task_list[$modified_task_id] = $modified_task;
            $modified_task = '';
        }
        break;
    case 'Cancel Changes':
        $modified_task = '';
        break;
    case 'Promote Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === null || $task_index === false) {
            $errors[] = 'There was an error promoting that task.';
        } elseif ($task_index == 0) {
            $errors[] = 'You can not promote the first task.';
        } else {
            $task_value = $task_list[$task_index];
            $priority_task_value = $task_list[$task_index - 1];
            $task_list[$task_index - 1] = $task_value;
            $task_list[$task_index] = $priority_task_value;
            break;
        }
    case 'Sort Tasks':
        $task_list = array_map('strtolower', $task_list);
        sort($task_list, SORT_NATURAL);
        break;

}

include 'task_list.php';
