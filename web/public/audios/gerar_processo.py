# -*- coding: utf-8 -*-
import sys
import io
import os
# from gtts import gTTS
import pyttsx3

# Ajuste para encoding UTF-8 na saída padrão
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')
sys.stderr = io.TextIOWrapper(sys.stderr.buffer, encoding='utf-8')

# Texto a ser Lido
texto = """
GERAÇÃO DE ARQUIVO
Edmilson Joaquim
Processo número: 0123456789012345667
Muito obrigado.
"""

def gerar_audio(nome_arquivo, diretorio_destino):
    # Garante que o diretório existe
    if not os.path.exists(diretorio_destino):
        os.makedirs(diretorio_destino)

    # Caminho completo para salvar o arquivo
    caminho_completo = os.path.join(diretorio_destino, nome_arquivo)

    # Gera o áudio
    #tts = gTTS(text=texto, lang='pt')
    #tts.save(caminho_completo)

    # Inicializa o engine de voz offline
    engine = pyttsx3.init()
    # Configura a voz (opcional)
    engine.setProperty('rate', 150)  # Velocidade de fala
    # Salva o áudio no arquivo
    engine.save_to_file(texto, caminho_completo)
    # Executa o processamento
    engine.runAndWait()

    print(f"Áudio gerado com sucesso em: {caminho_completo}")


if __name__ == "__main__":
    # Verifica se os argumentos foram passados
    if len(sys.argv) != 3:
        print("Uso: python gerar_processo.py <nome_arquivo> <diretorio_destino>")
        sys.exit(1)

    nome_arquivo = sys.argv[1]
    diretorio_destino = sys.argv[2]
    #arquivo_texto = sys.argv[3]

    # Lê o texto do arquivo
    # try:
    #     with open(arquivo_texto, 'r', encoding='utf-8') as f:
    #         texto = f.read()
    # except FileNotFoundError:
    #     print(f"Arquivo de texto '{arquivo_texto}' não encontrado.")
    #     sys.exit(1)
    # except Exception as e:
    #     print(f"Erro ao ler o arquivo de texto: {e}")
    #     sys.exit(1)

    gerar_audio(nome_arquivo, diretorio_destino)
