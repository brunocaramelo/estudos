## Storage Account
### Tipos
    - GP v1-> não suporta Hot and Cold(depreciada)
    - GP v2 -> current
    - Blob Storage -> apens blob

#### Tiers
    - Hot -> mais frenquencia, (Doc, Video, XLS...)
    - Code -> menos frenquencia, (Backup, Archives), Cobranca por acesso.

#### Replicacao
    - LRS -> Localy redundant Storage, apenas no datacenter
    - ZRS -> Zone redundant Storage , armazenado em zonas diferentes
    - GRS -> Geo redundant Storage, armaznear em regioes diferentes,acessar na regiao principal , o resto apenas por copia
    - RA-GRS -> Read-access Geo redundant Storage, leitura em varias regioes

#### Performance
    - Standard -> Mais barata , Spiniesng Disk(HD comum)
    - Premium -> Mais cara , SSD

### Criando um Storage Account
    - Dica sobre resource group. de preferencia criar um novo para cada finalidade...pois vc removendo um deles..tudo vinculado a eles, vai junto
    - Criando um container blob, apos criar uma conta storage, ir em >> Storage Explorer >> bt direito criar em BLOB CONTAINER
    - Criando um container file Shares, apos criar uma conta storage, ir em >> Storage Explorer >> bt direito criar em FILE SHARE
    - Criando um container queues, apos criar uma conta storage, ir em >> Storage Explorer >> bt direito criar em QUEUES
    - Criando um container tables, apos criar uma conta storage, ir em >> Storage Explorer >> bt direito criar em TABLES


### Permissoes SAS (Shared Acces Signature)
    - Access
    - Policy

    -> BLOB ->Read
        Container -> Read
        Privado e o padrao
        Nao distingue quem ou periodo de acesso, IP e etc

    -> SAS
        - Share     Access  Signature

            Data : inicio       Fim
            Horarios  xxx       xxx
            Permissoes : RWD

    - Aplicando SAS a um ir a Storage desejado >>  Shared access signature >> gerar uma assinatura baseada em um das duas chaves disponiveis
        - colocar a url a assinatura como por exemplo:
            - https://storadominiolala.blob.core.windows.net/fotonasaqui/Seimagesm.png?sv=2019-12-12&ss=b&srt=sco&sp=rwdlacx&se=2020-08-10T06:40:44Z&st=2020-08-09T22:40:44Z&spr=https&sig=fjssksksXJQMiGjQSreQgj0J6gpV1txR7jK6VKddVZ3k%3D
        - DICA : criar sempre as chaves (segmentadas de preferencia. como por aplicacao). depois apenas adiconar mais tempo..ou diminuir

### Criando um container a partir do client PowerShell
    - Instalar PowerShell, e usar pwsh (linux command)
    - Instalar e importar modulo : Install-Module Az, Import-Module Az depois...  usar o Connect-AzAccount
    -  executar comando de criacao : -ResourceGroupName StoragesResources -Name segundostorageaccount -Location 'South Central US' -SkuName Standard_LRS -Kind StorageV2

## AZ Copy
     - Ferramenta de transicao de arquivos da Azure Microsoft
        - Instalacao: https://docs.microsoft.com/en-us/azure/storage/common/storage-use-azcopy-v10
     - Executando programa:
        - ./azcopy copy "/home/dasdsadas/Imagens/teste/*" "https://dasda.blob.core.windows.net/conteineraqui?sp=racwdl&st=2020-08-10T00:57:14Z&se=2022-08-11T00:57:00Z&sv=2019-12-12&sr=c&sig=Qa07Tw1PyNpfYEeOzsDldSbNAEQGagYmLALog7eMv4s%3D" --recursive 

## Adiconando subdominio ao Storage
    - Ir ao dominio e cadastrar um CNAME

## Migrando dados com servico de Import/Export
 - https://docs.microsoft.com/en-us/azure/storage/common/storage-import-export-service
    - Utilidades: migração de dados , distribuição de Conteudo, Backup Archive
    - Formas :
            - Import/Export -> Upload Download ->boa conexao
            - Cli Tool -> disco HDD ,SSD to Azure

## Criando Site estatico

    - ir a Storage escolhido...
    - subir a pagina desejada >> ir ao Static Web site..e preencher os campsos Index document name E o Error document path

## Remover o Resouce group

    - ir em Resource Group  ir selecionar linha... e usar Delete resource group
    - isso ira remover complemente to os containers stoagres contidos.,,tomar cuidado..