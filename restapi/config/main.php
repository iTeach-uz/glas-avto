<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-restapi',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'restapi\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'language' => 'uz',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-restapi',
            'baseUrl' => '/restapi'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-restapi', 'httpOnly' => true],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    
        'urlManager' => [ 
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/restapi',
            'rules' => [
                'tanlov/detail/<id>' => 'tanlov/detail',
                'news/detail/<id>' => 'news/detail',
            ],
        ],
        
    ],
    'params' => $params,
];
