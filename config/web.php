<?php

$params = require(__DIR__ . '/params.php');

$config = [
  'id' => 'basic',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  // Internaionalisation. Only change the sourceLanguage if you use a different language as the default
  'language' => 'en_GB',
  'sourceLanguage' => 'en_GB',
  'components' => [
    'request' => [
      // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
      'cookieValidationKey' => '15VZ5a3yICoAsAyGwjv1718aY-i8b63L',
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'user' => [
      'identityClass' => 'app\models\User',
      'enableAutoLogin' => true,
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      // send all mails to a file by default. You have to set
      // 'useFileTransport' to false and configure a transport
      // for the mailer to send real emails.
      'useFileTransport' => true,
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
    //  Remove index.php and the HEX from the URI
    'urlManager' => [
      'showScriptName' => false,
      'enablePrettyUrl' => true
      ],
    //  This makes Yii2 get the libraries from CDN
    'assetManager' => [
      'bundles' => [
        'yii\web\JqueryAsset' => [
          'sourcePath' => null,
          'js' => ['//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'] // we'll take JQuery from CDN
        ],
        'yii\bootstrap\BootstrapPluginAsset' => [
          'sourcePath' => null,
          'js' => ['maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'] // Bootstrap.js from CDN
        ],
        'yii\bootstrap\BootstrapAsset' => [
          'sourcePath' => null,
          'css' => ['//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css',
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css'] // customized BS styles - optional
        ],
      /* 'nodge\eauth\assets\WidgetAssetBundle' => [
        'css' => [], // and now we disable EAuth asset css, because we're planning to use our own styles. Js files remain untouched.   ???
        ], */
      ],
    ],
    'db' => require(__DIR__ . '/db.php'),
  ],
  'params' => $params,
];

if (YII_ENV_DEV) {
  // configuration adjustments for 'dev' environment
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = 'yii\debug\Module';

  $config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
