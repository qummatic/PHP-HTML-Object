<?php
// {{{ form information
$forms = array(
    'id'=>'testform2',
    'name'=>'testform2',
    'method'=>'post',
    'action'=>'webform.php',
    'attribute'=>array('class'=>'webform')
);
// }}}

// {{{ fields information
$fields[] = array(
    'id'=>'address2',
    'name'=>'address2',
    'title'=>'Your Address',
    'type'=>'input|text',
    'value'=>'Bekasi, West Java, Indonesia',
    'attribute'=>array('class'=>'form-input')
);
$fields[] = array(
    'id'=>'city2',
    'name'=>'city2',
    'title'=>'Your City',
    'type'=>'select',
    'value'=>array(
        'JKT'=>array('Jakarta', true),
        'BDG'=>'Bandung',
        'SMG'=>'Semarang'
    ),
    'attribute'=>array('class'=>'form-input')
);
$fields[] = array(
    'id'=>'region2',
    'name'=>'region2',
    'title'=>'Your Region',
    'type'=>'input|text',
    'value'=>'Indonesia',
    'attribute'=>array('class'=>'form-input'),
    'datalist'=>array('Indonesia', 'UK')
);
//}}}

// {{{ submit, reset, and button information
$submits = array(
    'id'=>'formsubmit',
    'name'=>'formsubmit',
    'value'=>'Save',
    'attribute'=>array('class'=>'form-button')
);
$resets = array(
    'id'=>'formreset',
    'name'=>'formreset',
    'value'=>'Reset',
    'attribute'=>array('class'=>'form-button')
);
$buttons[] = array(
    'id'=>'buttoncancel',
    'name'=>'buttoncancel',
    'value'=>'Cancel',
    'attribute'=>array('class'=>'form-button')
);
// }}}

$hoforms = array(
    'form'=>$forms,
    'field'=>$fields,
    'submit'=>$submits,
    'reset'=>$resets,
    'button'=>$buttons
);
?>
