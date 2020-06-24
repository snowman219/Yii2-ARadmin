<?php
/**
 * Created by PhpStorm.
 * User: Alfred
 * Date: 20.10.2017
 * Time: 17:03
 */

return [
    [
        "parent" => "user",
        "child" => "editOwnModel"
    ],
    [
        "parent" => "admin",
        "child" => "loginToBackend"
    ],
    [
        "parent" => "systemadmin",
        "child" => "admin"
    ],
    [
        "parent" => "admin",
        "child" => "user"
    ]
];