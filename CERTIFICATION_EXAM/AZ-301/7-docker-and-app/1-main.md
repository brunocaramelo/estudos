## Azure Container Registry
    - criando o Registry 
        - ir para Container registry
        - criar um registro do registry
        - adicionar nome
        - adicionar User Admin
    - enviando imagem
        - CLI 
            - fazer o commit:  docker commit nginx-library registryaqui.azurecr.io/webserver:v1.0
            - fazer o login:  docker login -u="loginaqui" -p="Blakab" registryaqui.azurecr.io
            - fazer o push:  docker commit nginx-library registryaqui.azurecr.io/webserver:v1.0