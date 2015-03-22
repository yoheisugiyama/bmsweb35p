<?php
/**
 * Created by PhpStorm.
 * User: YSugiyamaMac
 * Date: 14/12/28
 * Time: 11:43
 */

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {


    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
    );

    public function alreadyExists($check){
        $existing_count=$this->find('count', array(
            'conditions'=>array(
                'User.username'=>$check['username']
            )
        ));

        return $existing_count>0;

    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }
}