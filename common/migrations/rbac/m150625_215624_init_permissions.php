<?php

use common\models\User;
use common\rbac\Migration;

class m150625_215624_init_permissions extends Migration
{
    public function up()
    {
        $adminRole = $this->auth->getRole(User::ROLE_ADMIN);
        $systemadminRole = $this->auth->getRole(User::ROLE_SYSTEMADMIN);

        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);

        $this->auth->addChild($adminRole, $loginToBackend);
        $this->auth->addChild($systemadminRole, $loginToBackend);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('loginToBackend'));
    }
}
