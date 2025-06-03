@echo off
REM Este script automatiza os comandos git add, commit e push com uma mensagem de commit gerada.

REM --- Geração da Mensagem de Commit ---
REM Obtém a data e a hora atuais do sistema
SET "DATA_ATUAL=%DATE%"
SET "HORA_ATUAL=%TIME%"

REM Extrai dia, mês, ano da data (assumindo formato DD/MM/YYYY)
SET "DIA=%DATA_ATUAL:~0,2%"
SET "MES=%DATA_ATUAL:~3,2%"
SET "ANO=%DATA_ATUAL:~6,4%"

REM Extrai hora e minuto da hora (assumindo formato HH:MM:SS,xx)
SET "HORA=%HORA_ATUAL:~0,2%"
SET "MINUTO=%HORA_ATUAL:~3,2%"

REM Concatena tudo para formar a mensagem de commit
SET "commit_message=pk.com.%DIA%%MES%%ANO%%HORA%%MINUTO%"

echo.
echo Usando a mensagem de commit: "%commit_message%"

REM --- Comandos Git ---
echo.
echo Adicionando todos os arquivos ao stage...
git add .
IF %ERRORLEVEL% NEQ 0 (
    echo ERRO: Falha ao adicionar arquivos.
    pause
    exit /b %ERRORLEVEL%
)
echo Arquivos adicionados com sucesso.

echo.
echo Realizando o commit...
git commit -m "%commit_message%"
IF %ERRORLEVEL% NEQ 0 (
    echo ERRO: Falha ao realizar o commit.
    pause
    exit /b %ERRORLEVEL%
)
echo Commit realizado com sucesso.

echo.
echo Enviando para o repositório remoto...
git push
IF %ERRORLEVEL% NEQ 0 (
    echo ERRO: Falha ao enviar para o repositório remoto.
    pause
    exit /b %ERRORLEVEL%
)
echo Push realizado com sucesso!

echo.
echo Operação Git concluída.
pause