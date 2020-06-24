<?php

use common\models\User;
use common\rbac\Migration;

class m150625_214101_roles extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $this->auth->removeAll();

        $user = $this->auth->createRole(User::ROLE_USER);
        $this->auth->add($user);

        $admin = $this->auth->createRole(User::ROLE_ADMIN);
        $this->auth->add($admin);
        $this->auth->addChild($admin, $user);

        $systemadmin = $this->auth->createRole(User::ROLE_SYSTEMADMIN);
        $this->auth->add($systemadmin);
        $this->auth->addChild($systemadmin, $admin);
        $this->auth->addChild($systemadmin, $user);

        $this->auth->assign($systemadmin, 1);
        $this->auth->assign($admin, 2);
        $this->auth->assign($user, 3);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->auth->remove($this->auth->getRole(User::ROLE_SYSTEMADMIN));
        $this->auth->remove($this->auth->getRole(User::ROLE_ADMIN));
        $this->auth->remove($this->auth->getRole(User::ROLE_USER));
    }
}
