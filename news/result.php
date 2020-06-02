<?
include '../config.php';

$pdo_result = $connect->query("SELECT * FROM news ORDER BY dati DESC");
$news = array();
while ($rows = $pdo_result->fetch_assoc())
{
	/*$news[]['id'] .= $rows['id'];
    $news[]['title'] .= $rows['title'];
    $news[]['message'] .= $rows['message'];
    $news[]['author'] .= $rows['author'];
    $news[]['dati'] .= $rows['dati'];*/

    $news[] = array(
    'id' => $rows['id'],
	'title' => $rows['title'],
	'message' => $rows['message'],
	'author' => $rows['author'],
	'dati' => $rows['dati']
	);
}
echo "<pre>";echo json_encode($news, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);echo "</pre>";

?>