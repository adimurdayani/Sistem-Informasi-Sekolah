<?php
// config
$config['num_links'] = 5;
// styling
$config['full_tag_open'] = '<div class="blog-post-single-pagination"><ul>';
$config['full_tag_close'] = '</ul></div>';

$config['first_link'] = 'Prev';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Next';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '<a href="">
    <img src="' . base_url('assets/frontend/') . 'images/blog/blog-btn-icon.png" alt="">
</a>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '<a href="">
    <img src="' . base_url('assets/frontend/') . 'images/blog/btn-icon.png" alt="">
</a>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="active"><a  href="#">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

$config['attributes'] = array('class' => '');
