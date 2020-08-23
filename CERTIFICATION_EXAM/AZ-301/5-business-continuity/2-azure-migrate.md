## Azure Migrate
   - Fisica -> cloud
   Necessario
      -> access Azure Readiness
         - compatibilidade com ambiente
      -> sizing
         - analise de ambiente, para verificar se o recurso e o suficente /ideal (relatorio por tempo para ver se sua recurso demais ou de menos)
      -> cost estimation
         - predição de valores no cloud
      -> dependency mapping
          - mapeamento de depencias de ligacoes entre servicos..dicas doque deve ser migrado tambem

## Custom Images

   -> VM
      -> Market Place
         -> Centos
            -> faz customizacoes..
               -> criar uma imagem, pos customizacoes (economia de tempo e menos erros)

### Criando uma imagem 
   -> Create a virtual machine
      -> selecionando Centos 8
      -> definindo imagem, disco. rede..
      -> baixar chaves da VM na conclusao da criacao
      -> baixar template(instalacao pura)..template_clean.zip
   -> usando
      -> abrir terminal
         -> ssh -i ChavequeOAzureLiberou_key.pem azureuser@IP_QUE_APARECE_NO_PAINEL
            ->reposta de sucesso
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @         WARNING: UNPROTECTED PRIVATE KEY FILE!          @
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            Load key "fsdfds.pem": bad permissions
            Permission denied (publickey,gssapi-keyex,gssapi-with-mic) 
   -> criando Captura
      -> dar Stop na VM (no Overview)
      -> clicar em Capture, preencher formulario para criar uma imagem customizada
