<?php
namespace App\Http\Controllers;

use App\Noticia;
use App\Providers\ProvedorDeDatas\Datas;
use Illuminate\Http\Request;

class ControladorDePesquisa extends Controller {

	public function index(Request $request) {
		$data = new Datas();
		$headInicio = $data->getDataInicio();
		$headFim = $data->getDataFim();

		$pesquisa = $request->requisicao;
		$resultadoNulo = "";
		$requisicoes = Noticia::where('topico', 'like', '%' . $pesquisa . '%')
			->orWhere('titulo', 'like', '%' . $pesquisa . '%')
			->orWhere('descricao', 'like', '%' . $pesquisa . '%')
			->orWhere('diaPostagem', 'like', '%' . $pesquisa . '%')
			->orWhere('mesPostagem', 'like', '%' . $pesquisa . '%')
			->paginate(10);
		if ($requisicoes->isEmpty() === true) {
			$resultadoNulo = "Não foram encontrados resultados para esta pesquisa.";
		}
		// retorno da view com as devidas variaveis
		return view('noticias.search',
			compact('headInicio', 'headFim', 'requisicoes', 'resultadoNulo', 'pesquisa'));

	}
}

?>