<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\DemoXml;


class DemoController extends Controller
{
public function actionXml()
{
    $demo = new DemoXml();
    $demo->generateXml();
    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    Yii::$app->response->headers->add('Content-Type', 'text/xml');
    return $this->renderPartial('xml');
}
}