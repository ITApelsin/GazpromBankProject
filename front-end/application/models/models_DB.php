<?php

	/**
	*	Класс для работы с Базами данных
	*
	*	Требования:
	*		- PHP 5.4 и более
	*
	*	Методы:
	*		@ migration()
	*			- создает стандартную БД для данного модуля в БД
	*			  Возвращает текст успешно или нет
	*
	*		@ connect($DB, $newDB)
	*			- метод для подключения к БД.
	*
	*		@ table($name, $key)
	*			- метод для генерации стандартных таблиц в БД.
	*
	*		@ SQL($sql)
	*			- метод для обработки запроса
	*
	*	@author Vadim Karakaytis <info@webdelo24.ru>
	*	@version 1.1
	*/

	defined('KERNEL_ACCESS') or header('Location: /');

	class DB extends core
	{
		private $SETTINGS;
		private $file;

		function __construct()
		{
			$this->SETTINGS = $this->config()->model_DB;

			$this->file = pathinfo(__FILE__);
			$this->file = $this->file['basename'];
		}

		public function migration($name = NULL)
		{
			/*
				{Описание метода}
				Метод для генерации стандартой БД
			*/

			if($name === NULL) 
			{
				$name = $this->SETTINGS['CONST']['DB_NAME'];
			}

			$DB = $this->connect(NULL, true); // Подключаемся к БД

			$mySQL_result = $DB->query("SHOW DATABASES LIKE '" . $name . "'");
			$mySQL_array = $mySQL_result->fetch_all();

			if(!$mySQL_array)
			{
				$mySQL_result = $DB->query("CREATE DATABASE `$name`");

				if($mySQL_result)
				{
					return 'OK: database [' . $name . '] created';
				}
				else
				{
					return 'ERROR: database [' . $name . '] not created (' . $DB->errno . ')';
				}
			}
			else
			{
				return 'ERROR: database [' . $name . '] already exists';
			}

			$DB->close(); // Закрываем соединение с БД
		}

		public function connect($DB = NULL)
		{
			/*
				Метод соединения с БД
			*/

			if($DB === NULL) 
			{
				$DB = $this->SETTINGS['CONST']['DB_NAME'];
			}

			@$mysqli = new mysqli(
				$this->SETTINGS['DB']['host'], 
				$this->SETTINGS['DB']['login'], 
				$this->SETTINGS['DB']['password'], 
				$DB
			);

			if($mysqli->connect_error) 
			{
				$this->CoreHandler(9, ['error' => $mysqli->connect_error, 'errno' => $mysqli->connect_errno]);
			}
			else
			{
				mysqli_query($mysqli, "SET NAMES 'utf8';");
				mysqli_query($mysqli, "SET CHARACTER SET 'utf8';");
				mysqli_query($mysqli, "SET SESSION collation_connection = 'utf8';");
				mysqli_query($mysqli, "SET SESSION collation_server='utf8_general_ci';");
				mysqli_query($mysqli, "SET character_set_client='utf8'");
				mysqli_query($mysqli, "SET character_set_connection='utf8'");
				mysqli_query($mysqli, "SET character_set_results='utf8'");
				mysqli_query($mysqli, "SET character_set_server='utf8'");
				
				return $mysqli;
			}
		}

		public function table($name, $key)
		{
			/*
				Метод для генерации стандартных таблиц в БД
			*/
		
			$DB = $this->connect(); // Подключаемся к БД

			$mySQL_result = $DB->query("SHOW TABLES LIKE '" . $name . "'");
			$mySQL_array = $mySQL_result->fetch_all();

			if(!$mySQL_array)
			{
				$mySQL_result = $DB->query("CREATE TABLE " . $this->SETTINGS['CONST']['DB_PREFIX'] . $name . "(" . base64_decode($key) . ")");

				if($mySQL_result)
				{
					return true;
				}
				else
				{
					return $DB->errno;
				}
			}
			else
			{
				return 'table already exists';
			}

			$DB->close(); // Закрываем соединение с БД
		}

		public function SQL($mySQL_result = NULL)
		{
			/*
				Метод для обработки SQL запроса
			*/
			$mySQL_array = false;

			if($mySQL_result == NULL)
			{
				return false;
			}
			else
			{
				while($mySQL_tmp = $mySQL_result->fetch_array(MYSQLI_ASSOC))
				{
	      			$mySQL_array[] = $mySQL_tmp;
	      		}

				return $mySQL_array;
			}
		}

	}