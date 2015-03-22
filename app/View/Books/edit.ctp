
<?php echo $this->element('header',array('header'=>$data));

//edit 画面
echo $this->Form->create('Book',array('action'=>'edit'));
echo $this->Form->input('id', array('required'=>'false'));
echo $this->Form->input('title', array('required'=>'false'));
echo $this->Form->input('price', array('required'=>'false'));

echo $this->Form->end('Save!');


