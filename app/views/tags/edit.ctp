<div class="ui-widget">
<?php
echo $this->Form->create();
echo $this->Form->input('tag', array('class' => 'ui-widget-content', 'size' => 32));
echo $this->Form->button('Edit Tag', array('class' => 'ui-button ui-widget ui-state-default'));
echo $this->Form->end();
?>
</div>