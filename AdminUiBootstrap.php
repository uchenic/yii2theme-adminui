<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace yii\adminUi;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\web\Controller;
use yii\base\Event;

class AdminUiBootstrap implements BootstrapInterface{
    public function bootstrap($app){
       

        // $app->set('view', [
        //     'class'=>'yii\web\View',
        //     'theme' => [
        //         'pathMap' => ['@backend/views' => '@backend/views'],   // for Admin theme which resides on extension/adminui
        //         //'baseUrl' => '@web/themes/adminui',
        //     ],
        //     'renderers' => [
        //         'tpl' => [
        //             'class' => 'yii\smarty\ViewRenderer',
        //             'cachePath' => '@runtime/Smarty/cache',
        //             'widgets' => [
        //                 'functions' => [
        //                     'GridView' => 'yii\grid\GridView',
        //                 ],
        //             ]
        //         ],
        //     ],
        // ]);
        
        $app->set('authManager', [
            'class' => 'yii\rbac\DbManager'
        ]);
        $app->set('assetManager' , [
            'class' => 'yii\web\AssetManager',
                'bundles' => [
                        'yii\widgets\ActiveFormAsset' => [
                             'js' => [],
                             'depends' => [
                                 'yii\adminUi\assetsBundle\AdminUiActiveForm',
                             ],
                        ],
                        'yii\grid\GridViewAsset' => [
                            'depends'   => [
                                'backend\assets\AppAsset'
                            ],
                        ],
            ],            
            'linkAssets' => true,
        ]);
        if(Yii::$app->id == "app-backend") {
            Yii::$container->set('yii\grid\GridView',
                [
                    'filterPosition' => '',
                    'layout' => "\n{items}\n
                        <div class=\"table-footer clearfix\">\n
                            {actions}\n
                            <div class=\"pagination-holder\">\n
                                {pager}\n
                            </div>\n
                            {summary}\n
                        </div>",
                    'tableOptions' => [
                        'class' => 'table table-hover table-striped'
                    ]
                ]
            );
            Yii::$container->set('yii\grid\ActionColumn',
                [
                    'options' => ['style' => 'width: 140px;'], 'contentOptions' => ['class' => 'action-column'], 'headerOptions' => ['class' => 'action-column']
                ]
            );
            Yii::$container->set('yii\grid\CheckboxColumn',
                [
                    'options' => ['style' => 'width: 40px;']
                ]
            );

        }
        // Event::on(Controller::className(), Controller::EVENT_BEFORE_ACTION, function ($event) {
        //     if(in_array($event->action->id,['login','forgot','reset-password']) && in_array('backend',  explode("\\", $event->sender->className()))){
        //         $event->sender->layout = '//blank';
        //     }
        // });
        // Event::on(Controller::className(), Controller::EVENT_BEFORE_ACTION, function ($event) {
        //     if(in_array($event->action->id, ['index']) && in_array('backend',  explode("\\", $event->sender->className()))){
        //         $event->sender->layout = '//index';
        //     }
        // });
        // Event::on(Controller::className(), Controller::EVENT_BEFORE_ACTION, function ($event) {
        //     if(in_array($event->action->id, ['create', 'update']) && in_array('backend',  explode("\\", $event->sender->className()))){
        //         $event->sender->layout = '//form';
        //     }
        // });

    }
}
