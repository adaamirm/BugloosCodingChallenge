<?php


namespace backend\models;
use yii\base\Model;

class Post extends Model
{

    public $id;
    public $userId;
    public $title;
    public $body;

    public function rules()
    {
        return [
            [['id','userId','title','body'],'required'],
            ['id','integer'],
            ['userId','integer']
        ];
    }


}

