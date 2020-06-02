<?
include 'config.php';
require_once 'simple_html_dom.php';
$data = file_get_html('https://xn----7sbgffetn1ahcahtfqb7a0v.xn--p1ai/');
var_dump($data);
//переводим его из xml в json
$json = json_encode($data);
var_dump($json);
//формируем массив из json
$data_r = json_decode($json,TRUE);
//можно проверить как сформировался массив
var_dump($data_r);
$i=0;
foreach($data_r as $post) 
{
	echo $post;
	$i++;
}
echo "всего:".$i;

/*$divList = $data->find('div.c_search_row');

echo $divList;*/

//class=row border border-bottom-0 c_search_row

/*if($data->innertext!='' and count($data->find('table')))
{ 
    foreach($data->find('.block_table_left') as $a)
    { 
        //echo ''.$a->plaintext.'<br>'; 
        print_r(''.$a->innertext.'<br>');
    } 
}*/


?>