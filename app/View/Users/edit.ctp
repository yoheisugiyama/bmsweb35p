<!-- app/View/Users/edit.ctp -->
<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php

        echo $this->Form->input('id', array('required'=>'false'));
        echo $this->Form->input('username', array('required'=>'false'));
        echo $this->Form->input('password',array('required'=>'false'));
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>