<?php $config = \DB::table('configs')->get();?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- META SECTION -->
        <title>{{$config[0]->appnome}} - {{$config[0]->slogan}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('assets/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <div class="error-container">
            <div class="error-code">404</div>
            <div class="error-text">PÁGINA NÃO ENCONTRADA</div>
            <div class="error-subtext">VOCÊ PARECE ESTAR TENTANDO ENCONTRAR SEU CAMINHO PARA CASA</div>
            <div class="error-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-info btn-lg btn-block" onClick="document.location.href = '/';">Voltar para página inicial</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
