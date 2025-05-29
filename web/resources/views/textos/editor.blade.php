@extends('layouts.siga')

@section('content')

<!doctype html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
    <!-- Modal -->
    <div id="caModal" class="modal" style="background-color: rgba(0, 0, 0, 0.3); opacity: 0.9;">

        <div class="container">
            <div class="card" style="z-index:1060; top:10px;">

                <div class="card-header text-white text-md font-bold" style='min-height: 70px !important; background-image: linear-gradient(to top, #0075be, #005a9c); color: rgb(255, 255, 255);'>
                <center>
                    <img width='30px;' src="{{ asset('/imgs/sistema/pk_siga.png') }}" id="ca"/>Editor de Texto

                    <a href="javascript:history.back()">
                        <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">&times;</button>
                    </a>
                </center>
                </div>

                <div class="card-body form-group">
                    @csrf
                    <form method="POST" action="{{ url('/editor/mostratexto') }}">
                        <div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-12">

                                <label style='font-size: 10px;'>Id do Texto</label>
                                <input type="text" id="id" name="id" class="form-control col-lg-2"/>

                                <label style='font-size: 10px;'>Doc. da Parte</label>
                                <input type="text" id="numbercpfcnpj name="numbercpfcnpj" class="form-control col-lg-4"/>
                            </div>
                            <BR>
                            <div>
                                <textarea id="descricao" name="descricao" rows="5" cols="40" class="form-control tinymce-editor">
                                    <?php //echo htmlspecialchars($descricao); ?>
                                </textarea>
                            </div>

                            <enter><button class="btn btn-primary" type="submit">Textos</button></center>
                        </div>
                    </form>


                    <div style='font-size: 9px;'>
                        <center>pk.siga.Ius - Centro Advogados </center>
                    </div>
                </div>
        </div>
    </div>
    </div>
    </body>

    <script src="{{ asset('js/tinymce/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/ce21bj2jgsw6fvku8c6ygc3e1tu17kh274lrewx9ik04vp48/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            language: 'pt_BR',
            height  : 270,
            menubar : true,
            resize  : true,

            plugins : [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],

            toolbar : 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            theme_advanced_blockformats : "p,div,h1,h2,h3,h4,h5,h6,blockquote,dt,dd,code,samp",
            tinycomments_author: 'Edmilson.Joaquim'
        });
    </script>

    <!-- Script Modal -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        jQuery(document).ready(function() {

            jQuery('#caModal').css('display','block');
            alert('JQuery Versão :'+jQuery.fn.jquery);
        });
    </script>

</html>
@endsection
