<!DOCTYPE html>
<html>

    @includeIf('Painel.Layouts.head')

    <body class="hold-transition skin-blue sidebar-mini">

        <div class="wrapper">

            @includeIf('Painel.Layouts.header');

            @includeIf('Painel.Layouts.sidebar_lateral')

            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                        Painel de Controle
                        <small>Página principal</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Página principal</li>
                    </ol>
                </section>

                @yield('content')

            </div>

            @includeIf('Painel.Layouts.footer')

        </div>

        @includeIf('Painel.Layouts.javascript')

    </body>
</html>
