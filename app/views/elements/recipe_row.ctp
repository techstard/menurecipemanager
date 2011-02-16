<tr class="recipeRow" id="row_<?php echo $rowNum; ?>">
    <td class="ui-widget-content">
        <?php
        echo $this->Form->input('Menu.recipes.' . $rowNum . '.name',
                array('options' => $recipes,
                    'div' => false,
                    'label' => false,
                    'class' => 'ui-widget-content recipeInput'));
        ?>
    </td>
    <td class="ui-widget-content">
        <?php
        echo $this->Form->input('Menu.recipes.' . $rowNum . '.description',
                array('div' => false,
                    'label' => false,
                    'class' => 'ui-widget-content'));
        ?>
    </td>
    <td class="ui-widget-content">
        <div class = "ui-icon ui-icon-close deleteRow"></div>
    </td>
</tr>