@echo off
REM Obtém a data e a hora atuais do sistema

REM Formato da data pode variar de acordo com a configuração regional.
REM No Brasil, geralmente é DD/MM/YYYY.
SET "DATA_ATUAL=%DATE%"
REM Formato da hora geralmente é HH:MM:SS,xx.
SET "HORA_ATUAL=%TIME%"

REM Extrai dia, mês, ano da data
SET "DIA=%DATA_ATUAL:~0,2%"
SET "MES=%DATA_ATUAL:~3,2%"
SET "ANO=%DATA_ATUAL:~6,4%"

REM Extrai hora e minuto da hora
SET "HORA=%HORA_ATUAL:~0,2%"
SET "MINUTO=%HORA_ATUAL:~3,2%"

REM Concatena tudo no formato desejado
SET "NOME_FINAL=pk.com.%DIA%%MES%%ANO%%HORA%%MINUTO%"

echo O nome gerado é: %NOME_FINAL%
pause