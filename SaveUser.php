<?PHP
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
    if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
    if (isset($_POST['surname'])) { $surname=$_POST['surname']; if ($surname =='') { unset($surname);} }
    if (isset($_POST['age'])) { $age=$_POST['age']; if ($age =='') { unset($age);} }
    if (isset($_POST['city'])) { $city=$_POST['city']; if ($city =='') { unset($city);} }
    if (isset($_POST['icq'])) { $icq=$_POST['icq']; if ($icq =='') { unset($icq);} }
    if (isset($_POST['lich_info'])) { $lich_info=$_POST['lich_info']; if ($lich_info =='') { unset($lich_info);} }
    if (empty($login) or empty($password) or empty($email) or empty($name) or empty($surname) or empty($lich_info) or empty($city)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) { die ("Неверно введен е-mail! <a href=\"javascript:history.back()\">Назад</a>"); }
 
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM user WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO user (login,password,email,name,surname,age,city,icq,lich_info) VALUES('$login','$password', '$email','$name', '$surname','$age','$city','$icq', '$lich_info')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='http://voskan.funy.ru/'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>
 