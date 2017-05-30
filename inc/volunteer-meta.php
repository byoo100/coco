<?php

// Field Array
$prefix = 'vsip_';

$vsip_post_meta_box = array(
    'id' => 'vsip-post-meta-box',
    'title' => __('Custom Meta', 'coco'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Custom Input One: ', 'coco'),
            'desc' => __('Enter your custom meta 1', 'coco'),
            'id' => $prefix.'custom_one',
            'type' => 'text'
        ),
        array(
            'name' => __('Custom Input Two: ', 'coco'),
            'desc' => __('Enter your custom meta 2', 'coco'),
            'id' => $prefix.'custom_two',
            'type' => 'text'
        ),
    )
);

?>
