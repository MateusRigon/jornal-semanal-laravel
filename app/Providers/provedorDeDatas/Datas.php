<?php

namespace App\Providers\ProvedorDeDatas;

class Datas {
	static $day;
	public function __construct() {
		date_default_timezone_set('America/Sao_Paulo');
		self::$day = date('w');
	}

	public static function getDataInicio() {
		return date('d/m', strtotime('-' . self::$day . ' days'));
	}
	public static function getDataFim() {
		return date('d/m', strtotime('+' . (6 - self::$day) . ' days'));
	}
	public static function getInicioDaSemana() {
		return date('Y-m-d', strtotime('-' . self::$day . ' days'));
	}
	public static function getFimDaSemana() {
		return date('Y-m-d', strtotime('+' . (6 - self::$day) . ' days'));
	}
	public static function getMesInicioDaSemana() {
		return date('m', strtotime('-' . self::$day . ' days'));
	}
	public static function getMesFimDaSemana() {
		return date('m', strtotime('+' . (6 - self::$day) . ' days'));
	}
	public function getMesAtual() {
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		return strftime('%B', strtotime('now'));
	}

}

?>