<?php
function tlog($logtype, $msg) {
  if (1) {
    $line  = "[ " . date('c') . " ] ";

    switch($logtype) {
      case E_ERROR :
        $line .= "ERROR   - "; break;
      case E_WARNING :
        $line .= "WARNING - "; break;
      case E_NOTICE :
        $line .= "INFO    - "; break;
      default :
        $line .= "DEBUG   - ";
    }

    $line .=  $msg . "\n";

    return error_log($line, 3, "tgaz.log");
  } else {
    return 0;
  }
}

function alt_response($http_code, $msg = null) {

  switch($http_code) {
    case 404 :
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        if (!$msg) { $msg = "The page that you have requested could not be found."; }
        echo "<p>$msg</p>";
        break;
    case 500 :
        http_response_code(500);
        echo "<h1>500 Internal Server Error</h1>";
        if (!$msg) { $msg = "The server encountered an unexpected condition which prevented it from fulfilling the request."; }
        echo "<p>$msg</p>";
        break;

  }
  exit();
}

class BindParam{
    private $values = array(), $types = '';

    public function add( $type, &$value ) {
        $this->values[] = $value;
        $this->types .= $type;
    }

    public function get() {
      $arr =  array_merge(array($this->types), $this->values);
    $refs = array();
    $c = count($arr);
    for ($i = 0; $i < $c; $i++) {
        $refs[$i] =  &$arr[$i];
    }

       return $refs;

    }

    public function getTypes() { return $this->types; }
    public function getValues() { return $this->values; }

}

function indent($n) {
  return str_repeat('  ', n);
}

?>
