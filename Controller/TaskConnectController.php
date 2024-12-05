<?php

namespace Kanboard\Plugin\TaskConnect\Controller;

use Kanboard\Controller\BaseController;

class TaskConnectController extends BaseController
{
    public function show()
    {
        $taskId = $this->request->getIntegerParam('task_id');
        $task = $this->taskModel->getById($taskId);

        if ($task) {
            $this->response->json([
                'user_id' => $this->userSession->getId(),
                'project_id' => $task['project_id'],
                'task_id' => $task['id'],
                'unix_time' => time(),
            ]);
        } else {
            $this->response->json(['error' => 'Task not found'], 404);
        }
    }
}

