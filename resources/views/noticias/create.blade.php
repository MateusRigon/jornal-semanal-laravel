@extends('layout')

@section('caminhoCSS')
../public/CSS/cadastro.css
@endsection
@section('responsividadeCSS')
../public/CSS/responsividade-cadastro.css
@endsection
@section('titulo')
Cadastro de notícias
@endsection

@section('conteudo')

@section('cabecalho')
<div class="d-flex justify-content-end pt-4 pb-4">
  <a href="pagina-inicial">Voltar para Home</a>
</div>
@endsection

@section('corpo-pagina')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="POST" class="form-group">
      @csrf
      <div class="d-flex justify-content-between" style="align-items:center;">
        <h1 class="mb-4">Cadastro de notícias</h1>
        <p><span class="requireDot"> * </span> Campos obrigatórios</p>
      </div>

        <p class="mb-4">Realize o cadastro de uma nova notícia</p>

        <div class="d-flex flex-column">
          <label for="titulo">Título <span class="requireDot"> * </span></label>
          <input class="form-control form-control-lg" type="text" name="titulo" placeholder="Ex: Nova proposta governamental..." required>
        </div>
        <div class="d-flex flex-column">
          <label for="topico">Tópico <span class="requireDot"> * </span></label>
          <input class="form-control form-control-lg" type="text" name="topico" placeholder="Ex: Economia, saúde..." required>
        </div>
        <div class="d-flex flex-column">
          <label for="descricao">Descrição <span class="requireDot"> * </span></label>
          <p>Informe uma descrição da notícia</p>
          <textarea class="form-control" rows="5" name="descricao" required></textarea>
        </div>
        <div class="d-flex flex-column">
          <label for="link">Link da matéria <span class="requireDot"> * </span></label>
          <p>Endereço original da matéria</p>
          <input class="form-control form-control-lg" type="text" name="link" placeholder="https://" required>
        </div>
        <div class="d-flex justify-content-center">
           <input class="btn btn-lg mt-5" id="submit" type="submit" value="Cadastrar">
        </div>
    </form>
@endsection
@endsection