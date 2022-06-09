<?php

namespace restapi\controllers;

use yii\rest\Controller;
use restapi\Settings\Cors;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Serializer;
use yii\web\Response;



class SettingsController extends Controller{

      
    public $serializer = array(
        'class' => Serializer::class,
        'collectionEnvelope'=>'items'
    );

    
    public function init(){

        Yii::$app->user->enableSession = false;
        Yii::$app->request->enableCsrfValidation = false;
        Yii::$app->response->format = Response::FORMAT_JSON;

        $languages = ['uz', 'ru', 'en'];
        $language = Yii::$app->request->headers['accept-language'];
        Yii::$app->language = in_array($language, $languages, true) ? $language : 'uz';


    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = Cors::settings();

        // re-add authentication filter
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
               // HttpBearerAuth::class,
            ],
        ];
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }



}