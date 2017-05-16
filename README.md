# practizi

Before using, make a "connect.php" file in 'Includes' folder to connect with the database.
Here is the PHP code you need,


  $db=new mysqli("sql_server_name", "user_name", "password", "db_name");

	if (!$db) {
	   die('Cant connect to server'.mysql_error());
	}
