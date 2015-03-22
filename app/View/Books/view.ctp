
<?php echo $this->element('header',array('header'=>$data))?>

<table class="booklist">


    <tr><td>id</td><td><?php echo h($book['Book']['id']); ?></td></tr>
    <tr><td>Title</td><td><?php echo h($book['Book']['title']) ?></td></tr>
    <tr><td>Price</td><td><?php echo h($book['Book']['price']); ?></td></tr>


</table>

