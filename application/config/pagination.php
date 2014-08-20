<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ページネーション
$config['uri_segment'] = 2;     //ページ番号セグメント
$config['num_links'] = 3;       //ページ番号表示数
//最初のリンク
$config['first_link'] = '&laquo;';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
//最後のリンク
$config['last_link'] = '&raquo;';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
//前後
$config['prev_link'] = '';
$config['next_link'] = '';
//現在ページタグ
$config['cur_tag_open'] = '<li class="active"><span>';
$config['cur_tag_close'] = '</span></li>';
//
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

//ページの表示結果全体の左側に置かれる開始タグ。
$config['full_tag_open'] = '<div class="row"><div class="col-md-12"><div class="text-center"><ul class="pagination pagination-large">';
$config['full_tag_close'] = '</ul></div></div></div>';