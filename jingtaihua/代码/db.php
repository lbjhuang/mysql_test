<?php
/**
* ���ݿ����ӷ�װ
* �ⲿ�����ݲ������⣬ֱ���ù���ʹ�ã����µĸ�ѧԱ˵�¼��ɡ�
* ��Ϊ������Ǳ�������ص㡣
*/
class Db {
	// �洢���ʵ���ľ�̬��Ա����
	static private $_instance;
	// ���ݿ����Ӿ�̬����
	static private $_connectSource;
	// �������ݿ�����
	private $_dbConfig = array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '',
		'database' => 'cms',
	);

	private function __construct() {
	}
	
	/**
	 * ʵ����
	*/
	static public function getInstance() {
		// �ж��Ƿ�ʵ����
		if(!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	* ���ݿ�����
	*/
	public function connect() {
		if(!self::$_connectSource) {
			// ���ݿ�����
			self::$_connectSource = @mysql_connect($this->_dbConfig['host'], $this->_dbConfig['user'], $this->_dbConfig['password']);	

			if(!self::$_connectSource) {
				// �׳��쳣����
				throw new Exception('mysql connect error ');
			}
			// ѡ��һ�����ݿ�
			mysql_select_db($this->_dbConfig['database'], self::$_connectSource);
			// �����ַ�����
			mysql_query("set names UTF8", self::$_connectSource);
		}
		// ������Դ����
		return self::$_connectSource;
	}
	
}