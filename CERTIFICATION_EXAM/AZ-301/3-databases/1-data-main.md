## DATA SERVICES

### Tipos de dados
 - Strutured Data -> Geralmente database (SQL)
 - Semi Strutured Data -> Tags/Keys (NoSql)
 - Unstrutured Data -> Blob (dados nao estruturados), pdf, imagens, txt

### Sobre SQL Services

  #### SQL SERVICES
  - https://azure.microsoft.com/en-gb/services/sql-database/
    - Tiers
        - Basic/Standard/Premium
    - Managed
    - Latest Version Microsfot SQL
    - Migracao/ Novo
    
    1 - Performance 
        - DTU (Database Throughput Unit) - https://docs.microsoft.com/en-us/azure/azure-sql/database/service-tiers-dtu
    2 - Compatibilidade 
    3 - Simplidade 

    ### SQL PRICES
    - https://azure.microsoft.com/en-gb/pricing/details/sql-database/single/

    - Cobranca
        - VCORE
            - Serveless
            - Provisioned Compute
        - DTU

    - Service Tier
        - General Purpose
        - Business Critical
        - HyperScale

    - Criando um Database Qualquer
        - processo bem simples de configucacao
        -  O FIREWALL VEM HABILITADO...BASTA COLOCAR O IP NAS CONFIGURACOES DE LIBERACAO NO FIREWALL DA BASE

   ### COnigurando (Long term retention) 
    - Backup -> 10 anos..5 anos
    - Entrart no sql server (testedabase) >> gerenciar backups >> configurar retencao
    - configurar backup  Anual/semanal