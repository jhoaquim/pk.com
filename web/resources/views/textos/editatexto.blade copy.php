@extends('layouts.modal')

@section('content')

@section('content')
    <section>
    <div class="carregando hide"></div>

        <center>
        <div class="container">
            <div style="background-image: linear-gradient(to bottom, white, #8e8f76; opacity: 1; z-index:1060; padding-top:5px;">
                <a href="{{ route('dashboard') }}">
                    <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-4 px-4 rounded">&times;</button>
                </a>

                <form action="" style="padding:5px;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label class="cor1" style="padding-left: 10px; float: left;">
                                <b  style='font-size: 12px;'>Id do Texto</b>
                                <b style='font-size: 20px;'>&nbsp;{{$texto->$id }}</b>
                            </label>

                            <label class="cor1" style="padding-left: 10px; float: center;">
                                <b style='font-size: 12px;'>Descrição</b>
                                <a href="javascript:alert('{{ substr($texto->$nome,0,25) }}')">
                                    <b style='font-size: 20px;'>{{ substr($texto->$nome,0,40) }}</b>
                                </a>
                            </label>
                        </div>

                        <div class="col-lg-10" style="padding-top:25px;">
                            <textarea id="descricao" name="descricao" rows="6" cols="100" class="form-control" enabled="False">
                                {{ $texto->$obs }}
                            </textarea>
                        </div>

                        <center><!-- Botão que abre o modal Cadastrar-->
                            <a href=''
                                class="btn btn-primary card-link"
                                type="submit"
                                data-twe-toggle="modal"
                                data-twe-target="#formPeticao"
                                data-twe-ripple-init
                                data-twe-ripple-color="light">

                                <div><button>Cria {{ substr($textos->$nome,0,25) }}</button></div>
                            </a>
                        </center>

                </form>
        <!----------------------------- Modal --------------------------------->
        <div data-twe-modal-init
            class="fixed top-5 z-[1055] hidden w-full max-h-screen overflow-y-auto overflow-x-hidden px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal"
            id="formPeticao"
            data-twe-backdrop="static"
            data-twe-keyboard="false"
            tabindex="-1"
            aria-labelledby="formPeticaoLabel"
            aria-hidden="true"
            >
            <div data-twe-modal-dialog-ref class="dark:bg-black pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-4 border-neutral-200 p-5 dark:border-cyan/10">
                    <!--Título do Modal -->
                        <h5 id="tituloModal" class="text-sm font-bold leading-normal text-surface dark:text-blue divTitulo">
                            Cadastrar Petição
                        </h5>
                            <!-- Botão Fechamento da Janela -->
                            <button
                                type="button" class="box-content rounded-none border-none hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                                data-twe-modal-dismiss aria-label="Close">
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
                    <?php
                    use PhpOffice\PhpWord\PhpWord;
                    use PhpOffice\PhpWord\Style\Alignment;
                    use PhpOffice\PhpWord\Style\Font;
                    use PhpOffice\PhpWord\Style\Paragraph;
                    use Sabberworm\CSS\Value\Size;
                    use PhpOffice\PhpWord\TemplateProcessor;
                    use PhpOffice\PhpWord\SimpleType\TblWidth;
                    use PhpOffice\PhpWord\Element\TextRun;

                    $phpWord = new \PhpOffice\PhpWord\PhpWord();
                    $font1 = new \PhpOffice\PhpWord\Style\Font();
                    $paragrafocentro = new \PhpOffice\PhpWord\Style\Paragraph();
                    //-------------- Dados --------------------------------------------->
                    $outorgante     = 'EDMILSON JOAQUIM';
                    $nac_e          = ', BRASILEIRO';
                    $pro_e          = ', Desempregado';
                    $rg_e           = ', RG: 15440970-4';
                    $cpf_e          = ', CPF 066.885.038-83';
                    $dom_e          = ', Rua Jordão da Costa';
                    $num_e          = ', 103';
                    $bai_e          = ', Vila Nhocuné';
                    $cep_e          = ', CEP  03563-030';
                    $mun_e          = ', São Paulo - SP';

                    $outorgado      = 'JOSÉ ROBERTO DA SILVA';
                    $nac_o          = ', BRASILEIRO';
                    $pro_o          = ', Advogado';
                    $rg_o           = ', RG: ';
                    $cpf_o          = ', CPF 052.939.968-78';
                    $dom_o          = ', Rua CORONEL AMARO SOBRINHO';
                    $num_o          = ', 99';
                    $bai_o          = ', Vila Carrão';
                    $cep_o          = ', CEP 03448-120';
                    $mun_o          = ', São Paulo - SP.';
                    $oab_o          = ', OAB : 110742/SP';

                    $font1 = array('name'=>'Arial','size'=>14, 'bold'=>true);
                    $font2 = array('name'=>'Arial','size'=>11, 'bold'=>false);
                    $font3 = array('name'=>'Arial','size'=>8, 'bold'=>true);
                    //$paragrafocentro->setAlignment(Alignment::CENTER);

                    $section1 = $phpWord->addSection();
                    $section1->addImage(asset('imgs/juridico/ejbs.jpg') ,
                    ['width' => 250, 'height' => 50] );
                    $section1->addTextBreak();
                    $section1->addText($nome,$font1);
                    $section1->addTextBreak();
                    $section1->addText('OUTORGANTE :', $font3 );
                    $section1->addText($outorgante.$nac_e.$pro_e.$rg_e.$cpf_e.$dom_e.$num_e.$bai_e.$cep_e.$mun_e,$font2);
                    $section1->addText('OUTORGADO :', $font3);
                    $section1->addText($outorgado.$nac_o.$pro_o.$oab_o.$rg_o.$cpf_o.$dom_o.$num_o.$bai_o.$cep_o.$mun_o,$font2);
                    $section1->addText($texto,$font2);
                    $section1->addTextBreak();
                    $section1->addText($outorgante,$font2);



                    $section1->addTextBreak(10);
                    //------------ Rodape --------------------------------------------------->
                    //$section1->addPageBreak(); //pula pagina
                    $section1->addTextBreak();
                    $section1->createFooter();
                    $section1->addImage(asset('imgs/juridico/ejbs.footer.jpg'), ['width' => 300, 'height' => 20]);

                    //------------ Secção2--------------------------------------------------->
                    $section2 = $phpWord->addSection();
                    $section2->setFontStyle($font2);

                    //$section1->addPageBreak(); //pula pagina

                    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
                    $objWriter->save('docs/juridico/88066118872/Contrato de honorários 88066118872.docx');

                    ?>

<h3>PROCURAÇÃO AD JUDICIA ET EXTRA</h3>
OUTORGANTE:
EDMILSON JOAQUIM,DIVORCIADO, DESEMPREGADO, RG No. 15440970-4, CPF No. 06688503883 domiciliado e residente à Rua AGRESTE DE ITABAIANA, 543 CEP 03683000  SAO PAULO/SP

OUTORGADO:
JOSÉ ROBERTO DA SILVA, BRASILEIRO, SOLTEIRO ADVOGADO  CPF No. 052.939.968-78, Inscrito na Ordem dos Advogados do Brasil sob No. 110742/SP, com escritório profissional sito à Rua CORONEL AMARO SOBRINHO, 99 VILA CARRÃO CEP 03448-120, SÃO PAULO, SP

<div class="col-lg-12" style="padding-top:25px;">
    <textarea id="descricao" name="descricao" rows="6" cols="100" class="form-control tinymce-editor">
        {{ htmlspecialchars($texto) }}
    </textarea>
</div>

<br>

<center class='reg'>SAO PAULO&nbsp;,&nbsp;{{ \App\Classes\Datas::dataHora() }}<br><br>
    {{ $outorgante }}<br>
</center>
                    <!-------------------->
                        <button id="salvar" name="salvar" type="submit" data-modal-target="salvar" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Salvar
                        </button>

                    </form>
                    <button id="fechar" data-twe-modal-dismiss data-twe-ripple-init
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('pessoas.listar') }}">Fechar</a>
                    </button>
                    <div class="carregando"></div>
                    </di>

                </div>

            </div>
        </div>
                    <div style='font-size: 9px; padding:20px;'>
                    <center class='reg'>Computatrum.Ius - DIREITO ELETRÔNICO&nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
                    </div>
        </div>
        </center>
    </section>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/tinymce/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/ce21bj2jgsw6fvku8c6ygc3e1tu17kh274lrewx9ik04vp48/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script type="text/javascript">

            tinymce.init({
                selector: 'textarea.tinymce-editor',
                language: 'pt_BR',
                height  : 250,
                menubar : true,
                resize  : false,

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
    <script>
    </script>

@endsection

@push('styles')

@endpush
