<?
$news = new News();
$user = new Users();

$connect = new mysqli("localhost", "u0987894_default", "3B_vZ8rX", "u0987894_default");
if ($connect->connect_error) {
    die('Connect Error (' . $connect->connect_errno . ') ' . $connect->connect_error);
}
//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");

class Users
{
    public function selectUserInfo($connect)
    {
        $users = $connect->query("SELECT * FROM users WHERE Email");
        if($users)
        {

        }
        else return print_r('test');
    }
}
class News
{
    public function selectNews($connect)
    {
        $news = $connect->query("SELECT * FROM news ORDER BY dati DESC");
        if($news)
        {
            $count=$news->num_rows;
            if($count > 0)
            {
                $min = $count-3;
                $row_c = $news->fetch_row();
                $total = $row_c[0]; // всего записей  
                $str_pag = ceil($total / 3); 
                if($count > 1)
                {
                    $row = $connect->query("SELECT * FROM news ORDER BY dati DESC LIMIT ".$min.",".$count."");
                }
                else 
                { 
                    $row = $connect->query("SELECT * FROM news ORDER BY dati DESC");
                }
                while ($rows = $row->fetch_assoc())
                {
                    echo '
                    <h5 class="card-title">'.$rows['title'].'</h5>
                    <p class="card-text">'.$rows['message'].'</p>
                    <p class="text-muted">'.$rows['author'].', '.ru_date($rows['dati'],2).'</p>
                    <hr>
                    ';
                }
                for ($i = 1; $i <= $str_pag; $i++)
                {
                    echo '<nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#" onClick="showContent("https://коронавирус-2019.рф/news/test.php")">'.$i.'</a></li>
                      </ul>
                    </nav>';
                }  
                
            }
            else return print_r('<br><span style="color: red;position:absolute; width:100%; top:50%; text-align:center;">Новостей пока нет..</span>');
        }
        else 
        {
            error_logs('3', $connect);
            return print_r('<br><span style="color: red;position:absolute; width:100%; top:50%; text-align:center;">Ошибка загрузки..</span>');
        }
    }
}

function updateLatest($cases, $deaths, $recovered, $newcasest, $newdeathst, $activecases, $affectedcount, $connect)
{
    $DATETIME = date('y.m.d H:i');
    $update = $connect->query("UPDATE latest SET cases='$cases', deaths='$deaths', recovered='$recovered', newcases = '$newcasest', newdeath = '$newdeathst', activecases = '$activecases', country = '$affectedcount', dati = '$DATETIME'");
    if($update)
    {
    	//$GLOBALS['sysMessages'] = "<br>Данные обновлены"; 
    	/*echo ''.$cases.', '.$deaths.', '.$recovered.'';*/
        print_r('<br><span style="color: green;position:absolute; width:100%; top:50%; text-align:center;">Данные обновлены.</span>');
    } 
    else
    { 
    	//$GLOBALS['sysMessages'] = "<br>Ошибка обновления";
    	/*echo ''.$cases.', '.$deaths.', '.$recovered.'';
    	echo $update;*/
        error_logs('3', $connect);
        return print_r('<br><span style="color: red;position:absolute; width:100%; top:50%; text-align:center;">Ошибка обновления</span>');
    	//echo mysqli_error($connect);
    }
}
function updateLatestCountry($cases, $deaths, $recovered, $newcasest, $newdeathst, $activecases, $country, $connect)
{
    echo $cases, $deaths, $recovered, $newcasest, $newdeathst, $activecases, $country;
	//echo ''.$total_cases.'<br>, '.$new_cases.'<br>, '.$total_deaths.'<br>, '.$new_deaths.'<br>, '.$total_recovered.'<br>, '.$active_cases.'<br>, '.$critical.'<br>, '.$tot_cases.'<br>, '.$tot_deaths.'';
    $updateRU = $connect->query("UPDATE latest_country SET cases='$cases', deaths='$deaths', recovered='$recovered', newcases = '$newcasest', newdeath = '$newdeathst', activecases = '$activecases' WHERE country = '$country'");
    //echo $updateRU;
    if($updateRU)
    {
    	print_r('<br><span style="color: green;position:absolute; width:100%; top:50%; text-align:center;">Данные обновлены.</span>'); 
    } 
    else
    { 
    	error_logs('3', $connect);
        return print_r('<br><span style="color: red;position:absolute; width:100%; top:50%; text-align:center;">Ошибка обновления</span>');
    }
}
function selectINFOcountry($country, $connect) 
{
    $select = $connect->query("SELECT cases, recovered, deaths, newcases, newdeath, activecases, countryname FROM latest_country WHERE country = '$country'");
    if($select)
    {
        if($select_row=mysqli_fetch_array($select))
        {
            print_r('<div class="table-responsive">
            <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Страна</th>
                <th>Всего случаев</th>
                <th>Всего вылечено</th>
                <th>Всего смертей</th>
                <th>Новых заражений сегодня</th>
                <th>Новых смертей сегодня</th>
                <th>Заражённых на данный момент</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>'.$select_row['countryname'].'</td> 
                <td style="text-align:center">'.$select_row['cases'].'</td>
                <td style="text-align:center"> <span class="text-success">'.$select_row['recovered'].'</span></td>
                <td style="text-align:center"> <span class="text-danger">'.$select_row['deaths'].'</span></td>
                <td style="text-align:center"> <span class="plus-wrapper">+'.$select_row['newcases'].'</span></td>
                <td style="text-align:center"> <span class="plus-wrapper plus-wrapper-danger">+'.$select_row['newdeath'].'</td>
                <td style="text-align:center"> <span class="text-warning">'.$select_row['activecases'].'</span></td>
            </tr>
            </tbody>
            </table></div>');
        }
    }
    else
    {
        error_logs('2', $connect);
        return print_r('Прозиошла ошибка, сообщите администратору: <a href="https://vk.com/mm.antonov">antonov.m&m</a>');
    }
}
function selectINFO($connect) 
{
    $select = $connect->query("SELECT cases, recovered, deaths, newcases, newdeath, activecases, country, DATE_FORMAT( dati, '%d %M %Y %H:%i' ) AS dati FROM latest");
    if($select)
    {
        if($select_row=mysqli_fetch_array($select))
        {
            //<div class="plus-wrapper">+20</div>
            print_r('
            <table class="table">
            <thead class="thead-dark">
            <tr><th>###</th><th style="text-align:center;">Количество ( чел.)</th></tr>
            </thead>
            <tbody>
            <tr><td>Всего случаев:</td> <td style="text-align:center"> <span class="text-warning">'.$select_row['cases'].'</span></td></tr>
            <tr><td>Всего вылечено:</td> <td style="text-align:center"> <span class="text-success">'.$select_row['recovered'].'</span></td></tr>
            <tr><td>Всего смертей:</td> <td style="text-align:center"> <span class="text-danger">'.$select_row['deaths'].'</span></td></tr>
            <tr><td>Новых заражений сегодня:</td> <td style="text-align:center"> <span class="plus-wrapper">+'.$select_row['newcases'].'</span></td></tr>
            <tr><td>Новых смертей сегодня:</td> <td style="text-align:center"> <span class="plus-wrapper plus-wrapper-danger">+'.$select_row['newdeath'].'</span></td></tr>
            <tr><td>Заражённых на данный момент:</td> <td style="text-align:center"> <span class="text-warning">'.$select_row['activecases'].'</span></td></tr>
            <tr><td>Заражённых стран:</td> <td style="text-align:center"> '.$select_row['country'].'</td></tr>
            <tr><td><b>Последнее обновление:</b></td> <td style="text-align:center;"> '.$select_row['dati'].'</td></tr>
            </tbody>
            </table>');
        }
    }
    else
    {
        error_logs('2', $connect);
        return print_r('Прозиошла ошибка, сообщите администратору: <a href="https://vk.com/mm.antonov">antonov.m&m</a>');
    }
}
function error_logs($code, $connect)
{
    $DATETIME = date('y.m.d H:i');
    switch ($code) 
    {
        case '1':
        {
            $errorCreate = $connect->query("INSERT INTO error_logs (reason, code, dati) VALUES ('Ошибка выполнения обновления статистики.', '1', '$DATETIME')");
            break;
        }
        case '2':
        {
            $errorCreate = $connect->query("INSERT INTO error_logs (reason, code, dati) VALUES ('Ошибка загрузки статистики.', '2', '$DATETIME')");
            break;
        }
        case '3':
        {
            $errorCreate = $connect->query("INSERT INTO error_logs (reason, code, dati) VALUES ('Ошибка выполнения запроса.', '3', '$DATETIME')");
            break;
        }
        default:
        {
            $errorCreate = $connect->query("INSERT INTO error_logs (reason, code, dati) VALUES ('Неизвестная ошибка.', '9999', '$DATETIME')");
            break;
        }
    }
}
function ru_date($string, $type)
{
    $date = new DateTime($string); // получаем объект
    $i = $date->format('n') - 1; // 6
    $months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Майя', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
    $ru_month = $months[$i]; //Июля
    if($type == 1)
    {
        $ru_date = $date->format("d $ru_month Y"); // 05 Июля 2015
    }
    else 
{
$ru_date = $date->format("d $ru_month Y h:m"); // 05 Июля 2015 20:00
}
    return $ru_date;
}
?>