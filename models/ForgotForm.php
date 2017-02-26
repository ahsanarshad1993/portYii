<?php

namespace app\models;

use Yii;
use yii\base\Model;


class ForgotForm extends Model
{
	public $email;
	private $_user = false;

    public function rules()
    {
        return [
            [['email'], 'required'],
        ];
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

}