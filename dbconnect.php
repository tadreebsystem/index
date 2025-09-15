<?php
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_NAME') ?: 'tadreebplatform';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: '';

function h($v){return htmlspecialchars($v??'',ENT_QUOTES,'UTF-8');}
function csrf_get(){ if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(16)); return $_SESSION['csrf']; }
function csrf_check($t){ return hash_equals($_SESSION['csrf']??'', $t??''); }

try{
  $pdo=new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",$db_user,$db_pass,[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
  ]);
}catch(Throwable $e){ http_response_code(500); echo "DB"; exit; }
 ?>
