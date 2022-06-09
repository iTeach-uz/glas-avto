<?php

namespace backend\modules\menumanager\controllers;

use backend\controllers\AsosController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `menumanager` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        
        if(!Yii::$app->user->can("Administrator")){
            throw new \yii\web\ForbiddenHttpException("Sizga ushbu sahifaga ruxsat berilmaga!");
        }
        return $this->render('index');
    }
}
