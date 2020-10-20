@extends('layout')

@section('caminhoCSS')
../public/CSS/home-page.css
@endsection
@section('titulo')
Pesquisa
@endsection

@section('conteudo')

@section('cabecalho')
	<div class="d-flex justify-content-center">
        <div class="d-flex flex-column">
          <div id="titulo"><h1>BOLETIM SEMANAL</h1></div>
          <div class="semana d-flex justify-content-center mb-3 mt-3">
            <h3>{{ $headInicio }} À {{ $headFim }}</h3>
          </div>
        </div>
    </div>
@endsection

@section('corpo-pagina')
    <div class="d-flex justify-content-between mb-5">
        <form class="w-50"  target="_blank" method="GET" action="pesquisa">
            @csrf
              <div class="input-group mb-3">
              <input name="requisicao"type="text"class="form-control"placeholder="Mês,tópico,titulo">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
              </div>
              </div>
        </form>
        <div class="nav-links">
          @auth
          <a class="btn-navbar mr-3" href="cadastro">Cadastrar nova notícia</a>
          <a class="btn-navbar mr-3" href="pagina-inicial">Home</a>
          <a class="btn-navbar" href="sair">Sair</a>
          @endauth

          @guest
          <a class="btn-navbar mr-3" href="pagina-inicial">Home</a>
          <a class="btn-navbar" href="login">Entrar</a>
          @endguest
        </div>
      </div>
    <h1 class="pt-2 pb-2 mb-5">RESULTADOS DA PESQUISA</h1>
    @if(!empty($resultadoNulo))
    <p class="mb-4">Termo buscado: {{ $pesquisa }}</p>
    <div class="bg-danger text-white p-2 mb-4 d-flex justify-content-center">
        <h4>{{ $resultadoNulo }}</h4>
    </div>
    @endif

    <div class="row mb-4">
      <div class="col-lg-9 d-flex justify-content-end align-items-center">
        @if($requisicoes->count() > 0)
        <div class="pr-5 pb-2 d-flex">
            <h5>Foram encontrados {{ $requisicoes->count() }} resultados nesta página</h5>
        </div>
        @endif
      </div>
      <div class="col-lg-3 d-flex justify-content-end">
        <div>
           {{ $requisicoes->links() }}
        </div>
      </div>
    </div>
    @foreach ($requisicoes as $requisicao)
      <div class="mb-4" id="noticia">
          <h1 id="topico" class="pt-2 pb-2 mb-4">{{$requisicao->topico}}</h1>
          <h3>{{$requisicao->titulo}}</h3>
             <p>{{date('d/m/Y', strtotime($requisicao->diaPostagem))}}</p>
             <p>
                {{$requisicao->descricao}}
             </p>
          <div class="d-flex">
            <a target="_blank" class="mr-4" href="{{$requisicao->link}}">
              Clique aqui para acessar a matéria completa
            </a>
            @auth
            <form method="POST" action="pagina-inicial/remover/{{ $requisicao->id }}"
                onsubmit="return confirm('Deseja excluir essa notícia?')">
              @csrf
              @method('DELETE')
              <input type="submit" name="excluir" value="Excluir matéria">
            </form>
            @endauth
          </div>
      </div>
    @endforeach
    <div class="d-flex justify-content-end">
      {{ $requisicoes->links() }}
    </div>
@endsection

 @section('final-pagina')
  <div id="footer" class="d-flex justify-content-center">
    <div class="pt-5">
      <h5>Desenvolvido por Mateus Rigon</h5>
      <div class="d-flex justify-content-center">
        <h5>Contato: <a href="https://www.linkedin.com/in/mateus-rigon-682583125/">LinkedIn</a></h5>
      </div>
    </div>
  </div>
  @endsection

@endsection
