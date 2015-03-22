<?php
/**
 * Created by PhpStorm.
 * User: YoheiSugiyama
 * Date: 15/02/21
 * Time: 21:39
 */

class Order extends AppModel
{

    public $primaryKey='orderno';

     public $belongsTo=array(
         'Category'=>array(
             'className'=>'Book',
             'foreignKey'=>'id',
         )
     );

}


