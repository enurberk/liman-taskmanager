<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_service_stat" => "TaskManagerController@getServiceStat",
    "kill_pid" => "TaskManagerController@killPid",
    "kill_all" => "TaskManagerController@killAllCommand",
    "process_tree" => "TaskManagerController@processTree",
    "run_argumant" => "TaskManagerController@runArgumentsPid",

    //File Manager Routes
    "file_list" => "FileManagerController@getList",
    "delete_file" => "FileManagerController@deleteFile"
];
