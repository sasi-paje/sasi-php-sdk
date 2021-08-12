#!/bin/bash

TARGET_DIR=""
TOTAL_FILES="11"

function HELP() {
    echo "usage: ./init.sh [-d DIR application, -h]"
    echo " "
    echo "options:"
    echo "-h, --help                mostra essa mensagem"
    echo "-d, --dir=DIR             o diretório onde o projeto \`laravel\` está"
}

while test $# -gt 0; do
    case "$1" in
    -h | --help)
        HELP
        exit 0
        ;;
    -d | --dir)
        shift
        if test $# -gt 0; then
            export TARGET_DIR=$1
        else
            echo "error: diretório do projeto não foi identificada"
            echo " "
            HELP
            exit 1
        fi
        shift
        ;;
    *)
        break
        ;;
    esac
done

# Validação de diretório
if [ -z "$TARGET_DIR" ]; then
    echo "error: diretório do projeto não foi identificada"
    echo " "
    HELP
    exit 1
fi
if [ -z "$(ls $TARGET_DIR | grep app)" ] || [ -z "$(ls $TARGET_DIR/app | grep Models)" ]; then
    echo "error: Diretório inválido: diretório '/app/Models' não encontrado;"
    exit 1
fi
if [ -z "$(ls $TARGET_DIR | grep config)" ]; then
    echo "error: Diretório inválido: diretório '/config' não encontrado;"
    exit 1
fi

# Check for local content
if [ $(ls ./models | wc -l) -ne $TOTAL_FILES ]; then
    echo "error: Modelos inválidos: algo deu errado ao copiar os modelos, execute 'git reset --HARD; git pull' e tente novamente"
    exit 2
fi
if [ -z $(ls ./payload | grep env-data) ] || [ -z $(ls ./payload | grep env-data) ]; then
    echo "error: Payloads inváidos: algo deu errado ao checar os dados dos payloads, execute 'git reset --HARD; git pull' e tente novamente"
    exit 2
fi

# Copy Models
if [ -z "$(ls $TARGET_DIR/app/Models | grep Sasi)" ]; then
    mkdir $TARGET_DIR/app/Models/Sasi
fi
rm $TARGET_DIR/app/Models/Sasi/*
cp ./models/* $TARGET_DIR/app/Models/Sasi

# Fill .env
if [ ! -z "$(ls $TARGET_DIR | grep .env)" ]; then 
    touch $TARGET_DIR/.env
fi
sed -i '/SASI_DB_/d' "$TARGET_DIR/.env" 2> /dev/null || sed -i '' '/SASI_DB_/d' "$TARGET_DIR/.env"
cat ./payload/env-data >> "$TARGET_DIR/.env"

echo "Modelos copiados e variáveis de ambiente inicializadas no '.env'!"
echo "Próximos passos:"
echo "- Configure a conexão com o banco editando as variáveis de ambiente no final do arquivo .env;"
echo "- Adicione essa configuração nas 'connections' em config/database:"
echo ""
cat ./payload/database-data
echo ""
echo ""
