<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" /></link>
    <title>{{ config('app.name', 'PK.C.Siga') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <style>


    </style>



    <nav class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div style="padding:10px;">
                <!-- Logo ou título -->
                <a href="{{ asset('/site/curriculum/eddie/construcao') }}" class="text-white text-md font-bold">
                    <center><img width='50px;' src="{{ asset('imgs/sistema/pk_siga_branco.png') }}">
                        Ejhoakin´s & Bernardo Silva Associados - Curriculum
                    </center>
                </a>
            </div>

            <div>
                <!-- Links do menu -->
                <ul class="flex space-x-4">
                    <li><a href="{{ asset('gerapdf/eddie') }}" class="text-white font8" style="padding-right:20px;">
                            Gerar PDF<b class="font40 text-white"><strong>CV</strong></b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <center>
            <section style='width:90%; overflow-y: auto;'>
                <nav class="py-4" style="padding:10px; background-color: #FF8C00; border-radius: 0 0 25px 0;">
                    <a href="javascript:history.back()">
                        <p class="retorna bg-green hover:bg-red-500 text-white font-bold py-2 px-2 rounded" >&times;</p>
                    </a>
                    <div class="container-fluid">
                        <div class="row texto-esquerda" style="position:relatve;">
                            <div id="pessoal1" class="texto-esquerda" style="display: inline-block; padding-right:23%; text-align: center;">
                                <p class="f-siga1 cor1 font-bold">Edmilson</p>
                                <p class="phont2 cor1">J o a q u i m</p>
                                <p class="phont2 cor1">Set / 1965 </p>
                            </div>

                            <div id="pessoal2" class="texto-esquerda cor1" style="display: inline-block; padding-left:40%;">
                                <p class="phont2"><img class="icon" width='16px;' src="{{ asset('/imgs/icones/location-place.png') }}"/> Rua Agenor de Barros, 130</p>
                                <p class="phont2">Ponte Rasa, cep 03881-100 São Paulo-SP</p>
                                <p class="phont2"><img class="icon" width='16px;' src="{{ asset('/imgs/icones/phone-symbol.png') }}"/> Fone  : 5511 98501-1431 / 5511 3804-1647</p>
                                <p class="phont2"><img class="icon" width='16px;' src="{{ asset('/imgs/icones/mail-email.png') }}"/> e-mail: edjo90@yahoo.com</p>
                            </div>
                        </div>
                    </div>
                </nav>

                <div id="image1" style="position: absolute; padding-left: 35%; top:150px;">
                    <img class="image3x4 w-24 md:w-28 lg:w-32" src="{{ asset('/imgs/sistema/ej/edmilson1.png') }}" style="border-radius:50%;"/><br>
                </div>


                <div style="display: inline-block; width:75%; padding-left:20px;" class="div-alinhada-direita">
                        <div class="texto-esquerda justify-center" style="text-align:justify;" >
                                <p class="f-cabeca1"><a href="{{ asset('estatuto') }}" class="text-blue text-md font-bold f-siga1">Objetivo(s) :</a></p><br>
                                <p class="grid justify-items-auto grid-cols-0">
                                Bacharel em Direito pela Universidade de São Paulo - UNIESP, com sólida experiência em áreas de atuação,  direito cívil, família, tributário,
                                empresarial, Previdenciário e do trabalho. Possui conhecimento aprofundado em legislação e jurisprudência, com destaque
                                para leis e temas relevantes. Com farto conhecimento e experiência no desenvolvimento da tecnologia da informação e
                                sistemas, apreciando oportunidades nas áreas de Análise de Dados, Sistemas e Direito Digital, com foco em Compliance e Segurança da Informação.
                                </p>

                                <p class="f-cabeca1 f-siga1 cor1 font-bold">Formação Acadêmica</p>

                                <p class="grid justify-items-auto" style="padding-bottom:5px;">
                                <p class="f-entidade">
                                    <p class="f-negrito">Entidade Educacional FACULDADE UNYLEYA</p>
                                    <p class="f-menor1">PÓS Graduação Perícia Judicial em Informática</p>
                                    <p class="f-menor1">conclusão  2021</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">UNIESP  - 	Universidade São Paulo - UNIESP</p>
                                    <p class="f-menor1">Curso de Direito Digital</p>
                                    <p class="f-menor1">conclusão  2019</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">UNIESP 	– 	Universidades São Paulo</p>
                                    <p class="f-menor1">Curso Tecnologia da informação</p>
                                    <p class="f-menor1">conclusão 2005</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">TMS – TM SOLUTIONS - Tecnologia da Informação</p>
                                    <p class="f-menor1">Certificação - Introdução Python, COBOL, CICS, ITIL e ITSM</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">TEKNO SOFTWARE TREINAMENTOS</p>
                                    <p class="f-menor1">Banco de Dados Oracle 8, Instalação / Administração, Linguagem PL/SQL Modelagem, Administração de Banco Dados</p>
                                    <p class="f-menor1">Programação DELPHI,  Servidores LINUX, shell Scripts</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">ACR – Centro de Treinamento São Paulo</p>
                                    <p class="f-menor1">Fundamentos, Técnicas Avançadas Aplicadas,Banco de Dados MSSQLServer</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">Line Brasil ScriptCase Partner Gold</p>
                                    <p class="f-menor1">Certificação ScriptCase – Framework Desenvolvimento linguagem PHP modulos I, II e Tecnicas Avançadas.</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">Protec – Centro de Tecnologia e Ensino</p>
                                    <p class="f-menor1">Certificação de Desenhos e Projetos Mecânicos, Tubulações Industriais.</p>
                                </p>
                                <p class="f-entidade">
                                    <p class="f-negrito">Udemy<br>
                                    <p class="f-menor1">Certificação EXIN PDPE Essentials – LEI GERAL PROTEÇÃO DADOS - LGPD</p>
                                    <p class="f-menor1">Certificação EXIN ISFS – Information Security Foundation ISO/IEC 27001</p>
                                    <p class="f-menor1">Certificação COBIT 5 Foundation</p>
                                    <p class="f-menor1">PYTHON WEB com DJANGO e DOCKER, ARDUINO</p>
                                </p>


                            <p class="f-cabeca1 f-siga1 cor1 font-bold">Experiências Profissionais</p>

                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito">ABCD - Associação Beneficente Comunitaria Desportiva Burgo Paulista</b></p>
                            <p><lb class="f-menor1">Período :</lb> JAN/2024</p>
                            <p><lb class="f-menor1">Cargo   :</lb> Analista Desenvolvedor, Assessor Jurídico  </p>
                            <p><lb class="f-menor1">Atuação : Analista Programador, Desenvolvimento de Sistema de gerenciamneto automação WEB, PHP,
                            assessoria jurídica nas áreas do direito imobiliário e Cívil.</p>

                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito">THS TECNOLOGIA Serviços e Soluções em TI</b></p>
                            <p><lb class="f-menor1">Período :</lb> DEZ/2023</p>
                            <p><lb class="f-menor1">Cargo   :</lb> Analista Desenvolvedor Sistemas </p>
                            <p><lb class="f-menor1">Atuação : Programação Desenvolvimento Automação de Sistemas, PHP, JQuery, CSS, MSSQLSERVER
                            codificação de sistemas padrão MVC , API's , controle de versionamento GIT e GITHub.</p>

                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito">SANTRI WEB PRAGRAMAS LTDA</b></p>
                            <p><lb class="f-menor1">Período :</lb> Jun/2021</p>
                            <p><lb class="f-menor1">Cargo   :</lb> Programador de Sistemas de Informação</p>
                            <p><lb class="f-menor1">Atuação : Programação Desenvolvimento Automação de Sistemas para e-Commerce OpenCart e ERP,
                            ORACLE,  MySql, HTML, PHP, JQuery, CSS,  codificação de sistemas padrão MVC.

                            <p class="f-entidade"><lb class="f-menor1"></lb>Empresa :</lb><b class=" f-negrito">HITSS DO BRASIL Serviços Tecnológicos LTDA.</b></p>
                            <p><lb class="f-menor1">Período :</lb> Nov/2019 - Ago/2020
                            <p><lb class="f-menor1">Cargo   :</lb> Analista Programador
                            <p><lb class="f-menor1">Atuação : Programação Desenvolvimento Sistemas para de Alta e Baixa Plataforma,
                            sistemas CICS, COBOL, JCL, DB2, ORACLE, POSTGRES, MSSQL Server, MySql, HTML, PHP, JQuery, CSS, Python e R,
                            Desenvolvimento WEB, arquivos em lotes, Shell scripts, codificação de sistemas padrão MVC, ambientes JBOSS,
                            tecnologia de WebServices, controle de versionamento GIT e GITHub, Governança de Dados, Gerenciamento
                            de Incidentes e serviços, Tecnologia ITSM / GSC.


                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito"> G&P Projetos e Sistemas S/A</b></p>
                            <p><lb class="f-menor1">Período :</lb> Jun/2019 - Nov/2019
                            <p><lb class="f-menor1">Cargo   :</lb> Analista Programador
                            <p><lb class="f-menor1">Atuação : Programação Desenvolvimento Sistemas para de Alta e Baixa Plataforma,
                            sistemas CICS, COBOL, JCL, DB2, ORACLE, POSTGRES, MSSQL Server, MySql, HTML, PHP, JQuery, CSS, Python e R,
                            Desenvolvimento WEB, arquivos em lotes, Shell scripts, codificação de sistemas padrão MVC, ambientes JBOSS,
                            tecnologia de WebServices, controle de versionamento GIT e GITHub, Governança de Dados, Gerenciamento
                            de Incidentes e serviços, Tecnologia ITSM / GSC.


                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito"> JS&Silva Advogados Associados</b></p>
                            <p><lb class="f-menor1">Período :</lb> Jan/2018 – Mai/2019
                            <p><lb class="f-menor1">Cargo   :</lb> Assistente Jurídico
                            <p><lb class="f-menor1">Atuação : Atividades do direito contencioso nas areas, Direito Digital Eletrônico, Civil, Penal,
                            Tributário, Trabalhista e Previdenciário.

                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito"> TM Solutions – Tecnologia da Informação</b></p>
                            <p><lb class="f-menor1">Período :</lb> Nov/2014 - Dez/2017
                            <p><lb class="f-menor1">Cargo   :</lb> Analista Programador de Automação
                            <p><lb class="f-menor1">Atuação : Analise, programação e Desenvolvimento  Sistemas para Automação de dados de Alta e Baixa Plataforma,
                            sistemas CICS, COBOL, JCL, DB2, ORACLE, MSSQL Server, MySql, HTML, PHP, JQuery, Python, Desenvolvimento WEB. Desenvolvimento, scripts
                            de codificação de sistemas padrão MVC, para automação, Gerenciamento de Incidentes, Management Information System . Automação para
                            ambientes JBOSS.</lb>


                            <p class="f-entidade"><lb class="f-menor1">Empresa :</lb><b class=" f-negrito"> Funap - Fundação Dr. Prof. Manoel Pedro Pimentel</b></p>
                            <p><lb class="f-menor1">Secretaria de Administração Penitenciaria SAP - Estado de São Paulo</lb>
                            <p><lb class="f-menor1">Período :</lb> Mai/2007 a mar/2014</lb>
                            <p><lb class="f-menor1">Cargo   :</lb> Analista Programador – Assessor l
                            <p><lb class="f-menor1">Atuação : Desenvolvimento e manutenção de software linguagem DELPHI - Base de dados
                            INTERBASE, plataforma Windows. Desenvolvimento de Software para gerenciamento de Processos Jurídicos,
                            Contratos, na administração direito público  governamental. Implementação de Sistema  ERP   Microsiga  TOTVS  –  PROTHEUS 10,
                            Módulos PCP,  Financeiro , Contratos , Contábil , Folha de Pagamento ,  Base de Dados  MSSQL Server e programação ADVPL.
                            Desenvolvimento de Software Controle de Arquivos,  desenvolvimento WEB fudamentado em PHP/ScripCase5, MySQL / MsSQLServer ,
                            plataforma WINDOWS 2003  e 2008 . Desenvolvimento de ferramentas para multiplas plataformas, W2003 , W2008 , Linux FEDORA e  DEBIAN,
                            configurações de ambientes e instâncias,  APACHE, Squid , Firewall, Samba, LDAP, JBoss , bases de  dados  MySQL, MSSQL Server ,
                            Postgre e Oracle. Serviços  VoIP , Servidor ASTERISK, disc-OS2 e  Softphone(s), Winconnection. Virtualização VirtualBox e VmWare .</lb>


                            <p class="f-entidade"><lb class="f-menor1">Empresa	:</lb><b class="f-negrito"> Laboratórios Clínicos Associados</b></p>
                            <p><lb class="f-menor1">Período	:</lb> Abr/2006 a Mai/2007
                            <p><lb class="f-menor1">Cargo	:</lb> Gestor de Informática
                            <p><lb class="f-menor1">Atuação	: Gestão e suporte , implantação sistemas novos e existentes , acompanhamento na migração de Sistema de
                            Gestão Integrada Laboratorial , base COBOL , para Visual Basic c/ Banco de Dados PostgreSQL. Gerenciamento e suporte  na implementação do sistema
                            de integração, nas áreas de Call Center, Faturamento, Comercial, Contas à Pagar e Receber, Controle de Custos, Contas Médicas, Estoque de Materiais e
                            Medicamentos, Compras,  Estatísticas e Planejamento Estratégico. Administração de rotinas de Backup , Contingência e Serviços de Servidores plataformas
                            Windows 2000 e 	RedHat Linux. Documentação de rotinas no Interfaceamento de equipamentos laboratoriais para exames, sistema MATRIX c/ Banco de Dados Cachê
                            e Interface SIL para aparelhos Johnson&Jonhson, Bayer ,Abbott , Bio Rad  e outros. Suporte e monitoramento dos links de acesso a LP de dados
                            e roteadores CISCO e Cyclades placas multi-	seriais e protocolos de comunicação.</lb>
                            </p>


                            <p class="f-cabeca1 f-negrito f-siga1 cor1 font-bold">Experiências e Conhecimentos gerais</p>
                            <p class="f-negrito f-menor1">
                            • Ferramentas e Linguagens de Programação e Desenvolvimento
                            Controle de Versionamento Git, GitHub, HTML, PHP, FLASH MX, Delphi7, CLIPPER5,
                            SCRIPTCASE 4, LARAVEL, JQUERY, JAVASCRIPT, CSS,  Python, R Studio, COBOL, CICS, JCL,
                            SHELL SCRIPT, LINUX, Programação WEB, Desenhos e Projetos Industriais, Eletrotécnico e Hidráulicos,
                            Governança , Arquivologia e Documentação, Administração Contratos e Geração de Editais, Noma ISO 27000.
                            </p>
                            <p class="f-negrito f-menor1">
                            • Ferramentas de Banco de Dados
                            MySQL
                            Oracle 8 PL/SQL
                            MSSQL Server
                            DB2 Connect - IBM
                            PostGres
                            </p>
                            <p class="f-negrito f-menor1">
                            • Plataformas
                            Windows Server
                            Netware Novell
                            Lotus Notes - IBM
                            LINUX Serviços DNS , SSH , APACHE, NFS ,SAMBA ,Shell Scripts.
                            JBoss Application Server
                            APM INSTROSCOP Computer Associates - IBM
                            Ferramentas Office Word, Excel, Power Poit, Access, Front Page, Softwares Graficos CorelDraw , Photoshop , Gimp ferramentas.
                            Instalação e manutenção de Servidores de Dados Tecnologia RAID/Storage, físico ou  software, espelhamento e virtualização  Vbox, VMWare.
                            </p>
                        </div>

                        <h1 style='color: rgb(0,0,139); font-size:9px; padding-top: 20px;'>PK Curriculum.Siga - DIREITO ELETRÔNICO</h1>

                </div>

                <div class="lateral" style="padding:5px; display: inline-block; width:25%">

                    <a href="{{ asset('apoio') }}">
                        <button class="retorna bg-orange hover:bg-orange-100 text-white font-bold py-2 px-4 rounded" >HABILIDADES</button>
                    </a>
                    <br><br>

                    <p><h1 class="text-white" style='font-size:9px; padding-top: 20px;'>DIREITO ELETRÔNICO</h1></p>
                    <p><h1 class="text-white" style='font-size:9px; padding-top: 20px;'>PERÍCIA FORENSE</h1></p>

                </div>
            </section>
    </center>

</html>
