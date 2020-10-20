@extends('layout')

@section('caminhoCSS')
../public/CSS/home-page.css
@endsection
@section('responsividadeCSS')
../public/CSS/responsividade-index.css
@endsection
@section('titulo')
Página inicial
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
              <input name="requisicao"type="text"class="form-control"placeholder="mês, tópico, título...">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
              </div>
              </div>
        </form>
        <div class="nav-links">
          @auth
          <a class="btn-navbar mr-3" href="cadastro">Cadastrar nova notícia</a>
          <a class="btn-navbar" href="sair">Sair</a>
          @endauth
          @guest
          <a class="btn-navbar" href="login">Entrar</a>
          @endguest
        </div>
      </div>
    @if(!empty($mensagemSucesso) || !empty($remover))
    <div class="bg-success text-white p-3 mb-4">
      <ul class="m-0">
        <li>{{ $mensagemSucesso }} {{ $remover }}</li>
      </ul>
    </div>
    @endif
    <h1 class="pt-2 pb-2 mb-5">RESUMO DE NOTÍCIAS</h1>
    <div class="d-flex justify-content-center">
      <h5 class="mb-5">Foram encontradas {{ $noticias->count() }} notícias esta semana</h5>
    </div>
    @foreach ($noticias as $noticia)
      <div class="mb-5" id="noticia">
          <h1 id="topico" class="pt-2 pb-2 mb-4">{{$noticia->topico}}</h1>
          <h3>{{$noticia->titulo}}</h3>
             <p>{{ date('d/m/Y', strtotime($noticia->diaPostagem)) }}</p>
             <p>
                {{$noticia->descricao}}
             </p>
          <div class="d-flex">
            <a target="_blank" class="mr-4" href="{{$noticia->link}}">
              Clique aqui para acessar a matéria completa
            </a>
            @auth
            <form method="POST" action="pagina-inicial/remover/{{ $noticia->id }}"
                onsubmit="return confirm('Deseja excluir essa notícia?')">
              @csrf
              @method('DELETE')
              <input type="submit" name="excluir" value="Excluir matéria">
            </form>
            @endauth
          </div>
      </div>
    @endforeach
@endsection

  @section('final-pagina')
  <div id="footer" class="d-flex justify-content-center">
    <div class="conteudo pt-5">
      <h5>Desenvolvido por Mateus Rigon</h5>
      <div class="d-flex justify-content-center">
        <h5>Contato: <a target="_blank" href="https://www.linkedin.com/in/mateus-rigon-682583125/">LinkedIn</a></h5>
      </div>
    </div>
  </div>
  @endsection

@endsection
