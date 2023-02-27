<?php

namespace app\models;

use yii\base\Model;

class Employee extends Model
{
    public $name;
    public $position;
    public $email;
    public $info;

    public function rules()
    {
        return [
            [['name', 'position', 'email', 'info'], 'required'],
            ['email', 'email'],
            ['info', 'string', 'max' => 150],
        ];
    }

    public function employeeData()
    {
        return [
            1 => 'CEO',
            2 => 'COO',
            3 => 'Supervisor',
        ];
    }
}
