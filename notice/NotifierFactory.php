<?php
require_once 'Notifier.php';
// ファクトリーで生成するインスタンスを全て読み込むことが必要
require_once 'SlackNotifier.php';
require_once 'MailNotifier.php';


class NotifierFactory {

	private $conf;

	public function __construct( string $conf_path = 'config.ini' ) {
		$this->conf = parse_ini_file( $conf_path );
	}

	public function get( $id ): Notifier {
		if ( ! array_key_exists( $id, $this->conf ) ) {
			throw new Exception( 'invalid id' );
		}
		$class_name = $this->conf[ $id ];

		return new $class_name();
	}
}