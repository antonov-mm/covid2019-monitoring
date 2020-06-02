<?

$connect = new mysqli("vla-wwc7qtot5u6hhcqc.db.yandex.net", "covid_public", "", "covid_public");
if ($connect->connect_error) {
    die('Connect Error (' . $connect->connect_errno . ') ' . $connect->connect_error);
}
//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");

?>