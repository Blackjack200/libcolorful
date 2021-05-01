<?php

class Token {
	public string $mark;
	public string $content;
}

function compile(Iterator $iter) : array {
	$buffer = '';
	$ret = [];
	foreach ($iter as $chr) {
		if ($chr === '§') {
			$token = new Token();
			$iter->next();
			$token->mark = $iter->current();
			$token->content = $buffer;
			$ret[] = $token;
			continue;
		}
		$ret[count($ret) - 1]->content .= $chr;
	}
	return $ret;
}


class StringIterator implements Iterator {
	private string $content;
	private int $len;
	private int $offset;

	public function __construct(string $content, int $offset = 0) {
		$this->content = $content;
		$this->len = mb_strlen($content);
		$this->offset = $offset;
	}

	public function current() : string {
		return mb_substr($this->content, $this->offset, 1);
	}

	public function next() : void {
		$this->offset++;
	}

	public function key() : int {
		return $this->offset;
	}

	public function valid() : bool {
		return $this->offset < $this->len;
	}

	public function rewind() : void {
		$this->offset = 0;
	}
}