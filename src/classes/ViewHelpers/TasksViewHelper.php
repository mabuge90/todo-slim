<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 11:37
 */

namespace ToDo\ViewHelpers;


class TasksViewHelper
{
    static public function outputUncompleteTasks($uncompletedTasks) {
        $return = '';
        foreach($uncompletedTasks as $task) {
            echo '<form action="/move-tasks" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="'. $task['name'] . '" placeholder="Add Todo"  aria-describedby="basic-addon2" name="completedTask">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                    </div> 
                </form>';
        }
        return $return;
    }

    static public function outputCompleteTasks($completedTasks){
        $return = '';
        foreach ($completedTasks as $task) {
            echo '<ul class="list-group">
                    <li class="list-group-item">' . $task['name'] . '</li>
                </ul>';
        }
        return $return;
    }
}


//<div class="form-check">
//  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
//  <label class="form-check-label" for="defaultCheck1">
//    Default checkbox
//</label>
//</div>
//<input class="form-check-input" type="checkbox" name="completedTask" value="0" id="defaultCheck1">

//'<div class="form-check">
//<input class="form-check-input" type="checkbox" name="completedTask" value="'. $task['id'] . '" id="defaultCheck1">
//
//                <label class="form-check-label" for="defaultCheck1"></label>' . $task['name'] . '</div>';
