<?php


namespace backend\controllers;

use backend\models\Post;
use yii\web\Controller;

use Yii;



class PostController extends Controller
{

    public function actionIndex(): string
    {


            return $this->render('index');

    }


    //*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    public function actionAjaxinsert(): string
    {

       $model = new Post;

       $array= array(array());

       $json = Yii::$app->request->post();

       if ($model->load($json) && $model->validate()) {


            $array = json_decode(utf8_encode($json), true);


            $connection = yii::$app->db->createCommand()->batchInsert('articleinfo', ['id', 'userid', 'title', 'body'], $array)->execute();

            return $this->render('_show', ['model' => $model]);


        }else{
            return $this->render('Ajaxinsert',['model' => $model]);
        }
    }


}

