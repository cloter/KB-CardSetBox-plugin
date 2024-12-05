<?php

namespace Kanboard\Plugin\TaskConnect;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        // Hook into the task dropdown to include the custom option
        $this->template->hook->attach('template:task:dropdown', 'TaskConnect:task/dropdown');

        // Add a custom route for fetching task info
        $this->route->addRoute('/task/connect/:task_id', 'TaskConnectController', 'show', 'plugin');

        // Add JavaScript to the layout
        $this->hook->on('template:layout:js', ['template' => 'plugins/TaskConnect/assets/taskconnect.js']);
    }

    public function getPluginName()
    {
        return 'TaskConnect';
    }

    public function getPluginDescription()
    {
        return 'Faz o gerenciamento das caixas odontológicas.';
    }

    public function getPluginAuthor()
    {
        return 'Cloter Migliorini Filho';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/yourusername/TaskConnect';
    }
}

