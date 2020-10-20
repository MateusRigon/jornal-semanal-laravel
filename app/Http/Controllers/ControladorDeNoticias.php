<?php
namespace App\Http\Controllers;

use App\Http\Requests\NoticiasFormRequest;
use App\Noticia;
use App\Providers\ProvedorDeDatas\Datas;
use Illuminate\Http\Request;

class ControladorDeNoticias extends Controller {

	public function index(Request $request) {
		$data = new Datas();
		$headInicio = $data->getDataInicio();
		$headFim = $data->getDataFim();
		$inicioDaSemana = $data->getInicioDaSemana();
		$mesInicio = $data->getMesInicioDaSemana();
		$fimDaSemana = $data->getFimDaSemana();
		$mesFim = $data->getMesFimDaSemana();

		// query em todos os dados que estejam nesta semana
		$noticias = Noticia::where('diaPostagem', '>=', $inicioDaSemana)->where('diaPostagem', '<=', $fimDaSemana)->get();
		// mensagens do servidor
		$mensagemSucesso = $request->session()->get('mensagemSucesso');
		$remover = $request->session()->get('remover');
		// retorno da view com as devidas variaveis
		return view('noticias.index', compact('noticias', 'mensagemSucesso',
			'remover', 'headInicio', 'headFim'));
	}

	public function create() {
		return view('noticias.create');
	}

	public function store(NoticiasFormRequest $request) {
		$data = new Datas();
		$mesAtual = $data->getMesAtual();
		$dia = date('Y-m-d');
		$noticia = Noticia::create(array_merge($request->all(),
			[
				'diaPostagem' => $dia,
				'mesPostagem' => $mesAtual,
			]
		));
		$request->session()->flash('mensagemSucesso', "Notícia cadastrada com sucesso!");
		return redirect('pagina-inicial');
	}

	public function destroy(Request $request) {
		Noticia::destroy($request->id);
		$request->session()->flash('remover', "Notícia removida com sucesso!");
		return redirect('pagina-inicial');
	}
}

?>