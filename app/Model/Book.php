<?php


class Book extends AppModel{

//    public $hasMany=array('Order');

    public $primaryKey = 'id';

    public $validate = array(

        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'タイトルの入力が必要です。'
            )
        ),
        'price' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '価格の入力が必要です。'
            )
        ),

    );

}