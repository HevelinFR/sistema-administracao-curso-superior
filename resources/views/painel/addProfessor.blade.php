@extends('painel.main')

@section('content')
    <div class="wrapper-container">
        <form class="form" action="/adicionar-professor" method="POST">
            @csrf
            <h1>Adicionar professor</h1>
            <div class="input-grup">
                <div class="input-box">
                    <label for="matricula">Matrícula</label><br>
                    <input id="matricula" name="matricula" type="text" placeholder="Matrícula" required>
                    <label for="nome">Nome</label><br>
                    <input id="nome" name="nome" type="text" placeholder="Nome" required>
                    <label for="email">Email</label><br>
                    <input id="email" name="email" type="text" placeholder="Email" required>

                </div>
            </div>

            <div class="button flex-container">
                <div>
                    <button type="submit" class="btn">Salvar</button>
                </div>
                <div>
                    <a href="/professor" class="btn red">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
@endsection

