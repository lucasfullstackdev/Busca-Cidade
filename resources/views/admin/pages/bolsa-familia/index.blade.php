@extends('admin.layouts.panel')

@section('content')
    
    <section div="container-api">
        <div id="container-form">
            <h2>Escolha a cidade</h2>
            <form action="{{ route('dashboard.search') }}" method="post">
                @csrf

                <div class="field-icon">
                    <label><i class="fa fa-globe"></i></label>
                    <input type="text" placeholder="Código IBGE" name="ibgeCode" value="2611101">
                </div>

                <div class="field-icon">
                    <label><i class="fa fa-calendar"></i></label>
                    <input type="date" name="dateReference" placeholder="Data de Referência">
                </div>

                <div class="container-button">
                    <button type="submit" class="btn btn-info">Consultar</button>
                </div>

            </form>

        </div>

        <div id="container-result">
            <h2>Cidade Selecionada</h2>

            <div class="">

            </div>
        </div>
    </section>

@endsection