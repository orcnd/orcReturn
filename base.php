
class orcReturn implements ArrayAccess  {
	private $s,$d;

	public function __construct($v1,$v2) {
		$this->sSet($v1);
		$this->d=$v2;
	}

	function sSet($v1) {
		if (!is_bool($v1)) {
			if (is_numeric($v1)) {
				if($v1<=0) {
					$v1=false;
				}else{
					$v1=true;
				}
			}elseif(is_string($v1)) {
				if (empty($v1)) {
					$v1=false;
				}else{
					if ($v1=='true' || $v1=='1' || $v1=='ok') {
						$v1=true;
					}else{
						$v1=false;
					}

				}
			}
		}
		if (!is_bool($v1)) $v1=false;
		$this->s=$v1;
	}

	public function offsetSet($offset, $value) {
		if (is_null($offset)) $offset=0;
		if (!is_numeric($offset)) $offset=0;
		if ($offset>1 || $offset<0) $offset=0;
		if ($offset==0) $this->sSet($value);
		if ($offset==1) $this->d=$value;
  }

	public function offsetExists($offset) {
    return true;
  }

  public function offsetUnset($offset) {
    return true;
  }

  public function offsetGet($offset) {
		if (is_null($offset)) $offset=0;
		if (!is_numeric($offset)) $offset=0;
		if ($offset>1) $offset=0;
		if ($offset==1) return $this->d;
   	return $this->s;
  }

	public function __clone() {
		return array();
	}

	public function __set($n,$v) {
		$fk=strtolower(substr($n,0,1));
		if ($fk=='d') {
			$this->d=$v;
		}else{
			$this->sSet($v);
		}
	}

	public function __get($n) {
		$fk=strtolower(substr($n,0,1));
		if ($fk=='d') return $this->d;
		return $this->s;
	}


	public function __debugInfo() {
		return [$this->s,$this->d];
	}

	function  __toString() {
		return "asd";
	}

}

function r($v1,$v2) {
	return new orcReturn($v1,$v2);
}
