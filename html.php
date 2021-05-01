<?php
require 'lex.php';

$colors = [];
$color['1'] = "<span style='color: rgb(0, 0, 192);'>%s</span>";
$color['2'] = "<span style='color: rgb(0, 191, 0);'>%s</span>";
$color['3'] = "<span style='color: rgb(0, 190, 190);'>%s</span>";
$color['4'] = "<span style='color: rgb(190, 0, 0);'>%s</span>";
$color['5'] = "<span style='color: rgb(190, 0, 190);'>%s</span>";
$color['6'] = "<span style='color: rgb(216, 163, 51);'>%s</span>";
$color['7'] = "<span style='color: rgb(190, 190, 190);'>%s</span>";
$color['8'] = "<span style='color: rgb(62, 62, 62);'>%s</span>";
$color['9'] = "<span style='color: rgb(63, 64, 252);'>%s</span>";
$color['0'] = "<span style='color: rgb(0, 0, 0);'>%s</span>";
$color['a'] = "<span style='color: rgb(63, 254, 63);'>%s</span>";
$color['b'] = "<span style='color: rgb(62, 255, 254);'>%s</span>";
$color['c'] = "<span style='color: rgb(253, 63, 63);'>%s</span>";
$color['d'] = "<span style='color: rgb(255, 63, 255);'>%s</span>";
$color['e'] = "<span style='color: rgb(254, 254, 62);'>%s</span>";
$color['f'] = "<span style='color: rgb(255, 255, 255);'>%s</span>";
$color['r'] = "<span style='color: rgb(255, 255, 255);'>%s</span>";
$color['n'] = "<span style='text-decoration: underline;'>%s</span>";
$color['m'] = "<em>%s</em>";
$color['l'] = "<b>%s</b>";
$color['o'] = "<s>%s</s>";

/**
 * @param Token[] $res
 */
function toHTML(array $res, array $colors) : string {
	$buf = '';
	foreach ($res as $tk) {
		$buf .= str_replace('%s', $tk->content, $colors[$tk->mark]);
	}
	return $buf;
}

echo toHTML(compile(new StringIterator('§e1§22§33')), $color);