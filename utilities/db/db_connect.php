<?php

	class db_connect
	{
		
		function __construct(){}

		function __destruct(){}


		public function connect()
		{
			require_once 'db_config.php';
			$connect = mysql_connect(db_host, db_user, db_password) or die ('No se pudo conectar a la Base de Datos '.mysql_error());
			mysql_select_db(db_database);
			return $connect;
		}

		public function disconnect()
		{
			mysql_close();
		}
	}
		
?>