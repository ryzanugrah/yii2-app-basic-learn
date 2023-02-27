<?php

namespace app\models;

use yii\base\Model;

class Comment extends Model
{
    public $name;
    public $comment;

    public function rules()
    {
        return [
            [['name', 'comment'], 'required'],
        ];
    }
}
