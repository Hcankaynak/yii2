<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use console\models\OwnRule;

class RbacController extends Controller {

    public function actionInit() {

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //add the rule
        $rule = new OwnRule();
        $auth->add($rule);

        // add the "updateOwn" permission and associate the rule with it.
        $updateOwn = $auth->createPermission('updateOwn');
        $updateOwn->description = 'update own';
        $updateOwn->ruleName = $rule->name;
        $auth->add($updateOwn);

        // add "admin" role and give this role
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        // Assign roles to admin. 1 is ID returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);

    }
}
