<?
include 'config.php';
require_once 'simple_html_dom.php';
$data = file_get_html('https://api.thevirustracker.com/free-api?global=stats');
$data2 = json_decode($data,true); 
if($data != '')
{
	echo 'Всего случаев: '.$data2['results'][0]['total_cases'].'<br>';
	echo 'Всего вылечено: '.$data2['results'][0]['total_recovered'].'<br>';
	echo '?: '.$data2['results'][0]['total_unresolved'].'<br>';
	echo 'Всего смерте: '.$data2['results'][0]['total_deaths'].'<br>';
	echo 'Новых заражений сегодня: '.$data2['results'][0]['total_new_cases_today'].'<br>';
	echo 'Новых смертей сегодня: '.$data2['results'][0]['total_new_deaths_today'].'<br>';
	echo 'Заражённых на данный момент: '.$data2['results'][0]['total_active_cases'].'<br>';
	echo ''.$data2['results'][0]['total_serious_cases'].'<br>';
	echo 'Заражённых стран:'.$data2['results'][0]['total_affected_countries'].'<br>';
	updateLatest($data2['results'][0]['total_cases'], $data2['results'][0]['total_deaths'], $data2['results'][0]['total_recovered'], $data2['results'][0]['total_new_cases_today'], $data2['results'][0]['total_new_deaths_today'], $data2['results'][0]['total_active_cases'], $data2['results'][0]['total_affected_countries'], $connect);
}
else 
{
	error_logs('1', $connect);
	print_r('<h2 style="color: orangered;position:absolute; width:100%; top:50%; text-align:center;">Произошла ошибка..</h2>');
}
$data_ru = file_get_html('https://api.thevirustracker.com/free-api?countryTotal=RU');
$data2_ru = json_decode($data_ru,true); 
if($data_ru != '')
{
	echo 'Всего случаев: '.$data2_ru['countrydata'][0]['total_cases'].'<br>';
	echo 'Всего вылечено: '.$data2_ru['countrydata'][0]['total_recovered'].'<br>';
	echo '?: '.$data2_ru['countrydata'][0]['total_unresolved'].'<br>';
	echo 'Всего смерте: '.$data2_ru['countrydata'][0]['total_deaths'].'<br>';
	echo 'Новых заражений сегодня: '.$data2_ru['countrydata'][0]['total_new_cases_today'].'<br>';
	echo 'Новых смертей сегодня: '.$data2_ru['countrydata'][0]['total_new_deaths_today'].'<br>';
	echo 'Заражённых на данный момент: '.$data2_ru['countrydata'][0]['total_active_cases'].'<br>';
	echo ''.$data2_ru['countrydata'][0]['total_serious_cases'].'<br>';
	updateLatestCountry($data2_ru['countrydata'][0]['total_cases'], $data2_ru['countrydata'][0]['total_deaths'], $data2_ru['countrydata'][0]['total_recovered'], $data2_ru['countrydata'][0]['total_new_cases_today'], $data2_ru['countrydata'][0]['total_new_deaths_today'], $data2_ru['countrydata'][0]['total_active_cases'], '1', $connect);
}
else 
{
	error_logs('1', $connect);
	print_r('<h2 style="color: orangered;position:absolute; width:100%; top:50%; text-align:center;">Произошла ошибка..</h2>');
}

?>
