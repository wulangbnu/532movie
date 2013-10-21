<?php
return array (
  0 => 'id',
  1 => 'cid',
  2 => 'title',
  3 => 'keywords',
  4 => 'color',
  5 => 'picurl',
  6 => 'inputer',
  7 => 'reurl',
  8 => 'remark',
  9 => 'content',
  10 => 'hits',
  11 => 'monthhits',
  12 => 'weekhits',
  13 => 'dayhits',
  14 => 'hitstime',
  15 => 'stars',
  16 => 'status',
  17 => 'up',
  18 => 'down',
  19 => 'jumpurl',
  20 => 'letter',
  21 => 'addtime',
  22 => 'score',
  23 => 'scoreer',
  '_autoinc' => true,
  '_pk' => 'id',
  '_type' => 
  array (
    'id' => 'mediumint(8) unsigned',
    'cid' => 'smallint(5)',
    'title' => 'varchar(255)',
    'keywords' => 'varchar(255)',
    'color' => 'char(8)',
    'picurl' => 'varchar(255)',
    'inputer' => 'varchar(50)',
    'reurl' => 'varchar(255)',
    'remark' => 'text',
    'content' => 'text',
    'hits' => 'mediumint(8)',
    'monthhits' => 'int(8)',
    'weekhits' => 'int(8)',
    'dayhits' => 'int(8)',
    'hitstime' => 'int(11)',
    'stars' => 'tinyint(1)',
    'status' => 'tinyint(1)',
    'up' => 'mediumint(8)',
    'down' => 'mediumint(8)',
    'jumpurl' => 'varchar(255)',
    'letter' => 'char(2)',
    'addtime' => 'int(11)',
    'score' => 'decimal(3,1)',
    'scoreer' => 'smallint(6)',
  ),
);
?>