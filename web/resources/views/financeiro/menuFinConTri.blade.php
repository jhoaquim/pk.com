@extends('../layouts.siga')

<style type="text/css">
    @font-face {
        font-family: 'vila madalena';
        src        : url("{{ asset('/fonts/vila madalena.otf') }}");
    }

    #contteudo
    {
        position		: relative;
  		background-color: transparent;
		top   			:  0px;
  		left  			:  0px;
	    margin-left		: 50px;
        margin-right    : 50px;
		border-radius	:  0px;
		border 			:  0px solid #999;
		padding-top		:  0px;

	}
    #cont1 	{
        position	  : relative;
  		background-color: transparent;
  		height		  : 190px;
		top   		  :  20px;
  		left  		  :   5px;
	    margin-left	  :   0px;
		border-radius :   0px;
		border 		  :   0px solid #999;
		padding		  :  10px;
		border 		  :   0px solid #999;
	}
    #cont2
    {
        position		: relative;
  		background-color: transparent;
  		height			: 190px;
		top   			:  12px;
  		left  			:   5px;
       	margin-left		:   0px;
		border-radius	:   0px;
		border 			:   0px solid #999;
		padding			:  10px;
		border 			:   0px solid #999;
	}
    #cont3 	{
        position		: relative;
        background-color: transparent;
  		height			: 190px;
		top   			:   5px;
  		left  			:   5px;
       	margin-left		:   0px;
		border-radius	:   0px;
		border 			:   0px solid #999;
		padding			:  10px;
  		border 			:   0px solid #999;
	}
    #box01 {
        background-color:  #0033FF;
        height			: 150px;
		width			: 170px;
		float			: left;
		margin			: 5 10px 10px 5;
		text-align		: center;
		line-height		: 70px;
		border-radius	: 10px;
		z-index			: 2;
  	    -webkit-box-shadow: 3px 3px 2px #888;
		box-shadow		: 3px 3px 2px #888;
		background-image: url('');
  		opacity			: 0.95;
        color		    : rgb(187, 189, 197);
        font-family	    : "Arial", Times, serif;
    }
    #box01:hover 	{
        background-color:#008000;
        color		    : #fff;
		font-family	    : "Arial", Times, serif;
        height			: 160px;
		width			: 180px;
		float			: left;
		margin			: 0 10px 10px 0;
	}

    #box05 {
        background-color:  #0033FF;
        height			: 150px;
		width			: 170px;
		margin			: 5 10px 10px 5;
		text-align		: center;
		line-height		: 70px;
		border-radius	: 10px;
		z-index			: 2;
  	    -webkit-box-shadow: 3px 3px 2px #888;
		box-shadow		: 3px 3px 2px #888;
		background-image: url('');
  		opacity			: 0.95;
        color		    : rgb(187, 189, 197);
        font-family	    : "Arial", Times, serif;
        float			: left;
    }
    #box05:hover 	{
        background-color: #EEDD82;
        color		    : #fff;
		font-family	    : "Arial", Times, serif;
        height			: 160px;
		width			: 180px;
		margin			: 0 10px 10px 0;
        float			: left;
	}

    #box06 {
        height			: 150px;
		width			: 350px;
        margin			: 5 10px 10px 5;
		text-align		: center;
		line-height		: 70px;
		border-radius	: 10px;
        z-index			: 2;
  	    -webkit-box-shadow: 3px 3px 2px #888;
		box-shadow		: 3px 3px 2px #888;
		background-image: url('');
  		opacity			: 0.95;
        background-color:  #FFA500;
        display         : inline-block;

    }
    #box06:hover 	{
        background-color:  #FFA500;
        color		    :rgb(245, 244, 242);
		font-family	    : "Arial", Times, serif;
        height			: 160px;
		width			: 360px;
		margin			: 0 10px 10px 0;

	}

    #box07 {
        background-color:  #0033FF;
        height			: 150px;
		width			: 170px;
		float			: left;
		margin			: 5 10px 10px 5;
		text-align		: center;
		line-height		: 70px;
		border-radius	: 10px;
		z-index			: 2;
  	    -webkit-box-shadow: 3px 3px 2px #888;
		box-shadow		: 3px 3px 2px #888;
		background-image: url('');
  		opacity			: 0.95;
        color		    : rgb(187, 189, 197);
        font-family	    : "Arial", Times, serif;
        background-image: url("{{ asset('imgs/icones/att_logo.png') }}");

    }
    #box07:hover 	{
        background-color:  #FF0000;
        color		    :rgb(100, 115, 177);
		font-family	    : "Arial", Times, serif;
        height			: 160px;
		width			: 180px;
		margin			: 0 10px 10px 0;
	}
    #box08 {
        background-color:  #0033FF;
        height			: 150px;
		width			: 170px;
		float			: left;
		margin			: 5 10px 10px 5;
		text-align		: center;
		line-height		: 70px;
		border-radius	: 10px;
		z-index			: 2;
  	    -webkit-box-shadow: 3px 3px 2px #888;
		box-shadow		: 3px 3px 2px #888;
		background-image: url('');
  		opacity			: 0.95;
        color		    : rgb(187, 189, 197);
        font-family	    : "Arial", Times, serif;
    }
    #box08:hover 	{
        background-color:#9400D3;);
        color		    : #fff;
		font-family	    : "Arial", Times, serif;
        height			: 160px;
		width			: 180px;
		float			: left;
		margin			: 0 10px 10px 0;
	}
    .sombra
    {
        position		    : absolute;
		background-color	: transparent;
        top   				: 10px;
		width 	    		: 170px;
		height				: 150px;
		-webkit-box-shadow	: 5px 5px 3px #888;
		box-shadow			: 5px 5px 3px #888;
		opacity				: 0.95;
	}
    .sombra:hover
    {
        color		        : #fff;
    }
    fb
    { 	color		: #000;
		font-family	: "Arial", Times, serif;
        font-size	: 20px;
	}
    fb:hover
    { 	color		: #fff;
		font-family	: "Arial", Times, serif;
        font-weight : bold;
        font-size	: 22px;
	}



</style>

<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <center style="padding-top:10px;">
    <section class="borda1" style="width:70%">
        <nav style="padding-right:30px;" class="py-2 ">
            <a href="{{ route('dashboard') }}">
                <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
            </a>
        </nav>

        <a href=''
            data-twe-toggle="modal"
            data-twe-target="#sigaBackdrop"
            data-twe-ripple-init
            data-twe-ripple-color="light"><!-- Botão que abre o modal Cadastrar-->
            <div class="divTitulo">menu Finanças, Contabil e Tributários </div>
        </a>


        <!----------------------------- Modal --------------------------------->
        <div data-twe-modal-init
            class="fixed top-5 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
            id="sigaBackdrop"
            data-twe-backdrop="static"
            data-twe-keyboard="false"
            tabindex="-1"
            aria-labelledby="sigaBackdropLabel"
            aria-hidden="true">
            <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                    <!--Título do Modal -->
                        <h5 id="tituloModal" class="text-sm font-bold leading-normal text-surface dark:text-blue divTitulo">
                            Cadastrar Pessoa
                        </h5>
                        <!-- Botão Fechamento da Janela -->
                        <button
                            type="button"
                            class="box-content rounded-none border-none hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                            data-twe-modal-dismiss
                            aria-label="Close">
                            <span class="[&>svg]:h-6 [&>svg]:w-6">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Corpo do Modal -->

                    <form name='editar' action="{{ route('pessoas.adicionar') }}" class="sombra form" method='get'  enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')  <input type="hidden" name="id" >

                        <div style="padding:10px; border-radius: 1px;">

                            <div class="rotulo"><b>Nome: /  CEP:</b></div>
                                <div class="form-group">
                                    <input class="campo1" style="float: left;" id="nome" name="nome" value="" size="70" class="required" type="text" placeholder="nome completo">
                                    <input class="campo3" id="cep" name="cep" value="" type="text" maxlength="9" placeholder="cep">
                                </div>

                            <div class="rotulo"><b>Endere&ccedil;o</b> / <b>n&utilde;mero</b></div>
                                <input class="campo2" style="float: left;" id="endereco" name="endereco" value="" size="70" class="required" type="text" placeholder="endereço">
                                <input class="campo3" id="nr" name="nr" value="" type="text" placeholder="número">

                            <div class="rotulo"><b>Bairro / e-mail </b></div>
                                <input class="campo1" style="float: left;" id="bairro" name="bairro" value="" size="40" class="required" type="text" placeholder="bairro">
                                <input class="campo1 email" id="email" name="email" value="" type="email" placeholder="e-mail@exemplo.com.br">

                            <div class="rotulo"><b>Complemento / data Nascimento</b></div>
                                <input class="campo1" style="float: left;" id="complemento" name="complemento" value="" type="text" placeholder="complemento">
                                <input class="campo1" id="dt_nascimento" name="dt_nascimento" value="" type="text" placeholder="dd/mm/aaaa">

                            <div class="rotulo"><b>Estado(s) / Cidade(s)</b></div>
                                <select class="form-label campo3" style="float: left;" id="estado" name="estado" class="required" >
                                    <option value=""></option>
                                </select>

                                <select class="campo2" name="municipio" id="municipio" class="form-select" disabled="true">
                                    <option value=""></option>-->
                                </select>

                            <div class="rotulo topo campo1"><b>Associado / Tipo Pessoa</b></div>

                                    <input id="associado_id" style="float: left;" name="associado_id" type="hidden" value="">
                                    <select id="associado" name="associado" class="form-label">
                                        <option value="0" >Selecione</option>
                                        <option value="1" >CLIENTE</option>
                                        <option value="2" >ADVOGADO</option>
                                        <option value="3" >ASSOCIADO</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <input class="btn-radio" type="radio" id="pessoa_tp_juridica" name="pessoa_tp" value="J" checked="false" >&nbsp;Jurídica
                                    <input class="btn-radio" type="radio" id="pessoa_tp_fisica" name="pessoa_tp" value="F" checked="true" >&nbsp;<b>Física</b>&nbsp;&nbsp;

                            <div class="rotulo"><b>cpf-cnpj / rg-Insc.Estadual</b></div>
                                <input class="campo1" style="float: left;" id="cpf_cnpj" name="cpf_cnpj" value="" type="text" placeholder="cpf / cnpj">
                                <input class="campo1" id="rg_ie" name="rg_ie" value="" type="text" placeholder="RG / Inscrição Estadual">

                            <div class="rotulo" ><b>Observação</b></div>
                                    <textarea style="float: left;" style="text-align: left;" rows="2" cols="100" maxlength="500"
                                    class="campo" id="obs" name="obs" type="textarea" placeholder="Observação">
                                    </textarea>

                        </div><!-- Modal footer -->

                        <div class="rotulo"><b>status ativo</b>
                            <input class="campo1" id="status" name="status" value="TRUE" type="checkbox" checked style="width:25px;" disabled>
                            <label class="fixo"><b class="rotulo">{{ dateFormatDatabaseScreen(now(), 'screen') }}
                        </div>
                        <button id="salvar" name="salvar" type="submit" data-modal-target="salvar" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Salvar
                        </button>

                    </form>
                    <div class="carregando"></div>
                    <button id="fechar"
                        data-twe-modal-dismiss
                        data-twe-ripple-init
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('pessoas.listar') }}">Fechar</a>
                    </button>
                    </div>

                </div>

            </div>
        </div>

        <div id='contteudo'>
            <div id='cont1'>

                <a href="construcao">
                <div id='box01' class='sombra box1'>
                    <fb>Lançamentos</fb>
                    <center>
                        <div id='box01_'>
                            <img src= "{{ asset('imgs/icones/lancamentos.png') }}" width='70' height='70'>
                        </div>
                    </center>
                </div>
                </a>

            </div>

            <div id='cont2'>

                <a href="construcao">
                    <div id='box05' class=''>
                        <fb>Box 5</fb>
                        <center>
                            <div id='box05_'>
                                <img src= "{{ asset('imgs/sistema/micro.gif') }}" width='70' height='70'>
                            </div>
                        </center>
                    </div>
                </a>
                <a href='construcao'></a>
                    <div id='box06' class=''>
                        <fb class=''>Box 6</fb>
                        <center>
                            <div id='box06_'><img src= "{{ asset('imgs/sistema/micro.gif') }}" width='70' height='70'></div>
                        </center>
                    </div>
                </a>
                <a href="construcao">
                    <div id='box07' class=''>
                        <fb>Box 7</fb>
                        <center>
                            <div id='box07_'>
                             <!--   <img src= "{{ asset('imgs/sistema/pk_siga.png') }}" width='70' height='70'> -->
                            </div>
                        </center>
                    </div>
                </a>

            </div>

            <div id='cont3'>
                <a href="financas">
                <div id='box08' class=''>
                    <fb>Plano de Contas</fb>
                    <center>
                        <div id='box08_'>
                            <img src= "{{ asset('imgs/icones/ico.p.c.png') }}" width='120' height='120'>
                        </div>
                    </center>
                </div>
                </a>

            </div>
        </div>

        </div>
</center>
<!--------------------------------------------------------------------->
@endsection

<script type="module">

</script>


