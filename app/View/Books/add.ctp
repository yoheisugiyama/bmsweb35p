
<?php echo $this->element('header',array('header'=>$data))?>

<h1>書籍追加</h1>

<?php

echo $this->Form->create('Book');
echo $this->Form->input('title', array('required'=>'false'));
echo $this->Form->input('price', array('required'=>'false'));
echo $this->Form->end('登録');


echo $this->Form->create('Book', array('type'=>'post','action'=>'index'));
echo $this->Form->end('戻る');


?>