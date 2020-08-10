## Tipos de acesso x precos

https://azure.microsoft.com/en-ca/pricing/details/active-directory/


### Criando um novo azure AD Tenant
 - create tenant
 - ao criar um novo tenant sao separados os recursos e subscritions

### Criando usuario/grupo
 Usuarios fazem parte de grupos
 
 - criar grupo
    - tipo security (monitoria e aplicaco de politica de seguranca)
    - tipo office365 (IDEM security + acesso a recursos da suite como email e aplicaoes office)
 - criar usuario
    - criacao de metadados...vinculo a grupos roles e etc


### MFA - Multi factor autenticantion

   - O fator de autenticacao pode use SMS , diponibilizando um codigo..ou o uso de um APP da microsoft que garante o mesmo.
   
   #### Habilitando MFA
      - habilitar  em:https://account.activedirectory.windowsazure.com/usermanagement/multifactorverification.aspx?tenantId=[[TENENT_ID]]culture=pt-br&requestInitiatedContext=users

   #### Self service password
      - Recurso pago -> Premium 1 ou 2 -> trial de 30 dias
       - usuario recebe um link de recuperacao de senha.
         - usuario >> password reset >> authentication methods >> method 1 ou 2


### AD Connect Synch
    - Sincronia de  ambiente on premisse com Azure AD
      - Filtrar , password , device , prevent delete (necessidade de excluir em ambas a partes para evitar acidentes)

   #### Criação e configuracao
      1 - criação de um Windows server (2019) e configuracao de AD  para o AD "local"
      2 - configurar Azure AD Connect (client)
         - Acessa conta no Azure do diretorio correto >> Azure AD Connect >> Selecionar usario que tenha Admin Global
         - Instalar Cliente no AD local >> login e senha do passo anterior, login Senha Admin Local

   #### Azure Connect Health
      - acessar Azure AD Connect  https://portal.azure.com/#blade/Microsoft_Azure_ADHybridHealth/AadHealthMenuBlade/QuickStart
      - Download do AD conncet health Agent for AD DS , instalacao e login do usario configurado no Azure AD
   
   ## PIM (Privilege identity management)
   - https://docs.microsoft.com/en-us/azure/active-directory/privileged-identity-management/
   - Usado em Recursos, Azure ADm, SAAS
   - User -> Grupos , Admin , Global Admin
   - Subscription : Global Admin
   - Acesso a recursos, Ad , liberacao por periodo, criacao de alertas, criacao de workflow com itens de recursos e etc
    - Roles 
      - directory roles -> AD Roles
      - Resource roles -> RBAC, Roles (VM -> tipo N2), Subscription
   #### Configurando um PIM para AD Roles (necessario Premium)
      - Selecionar usuario >> directory roles, adcionar Admin Global por exemplo
      - Ir a >> Licenses (diponivel em P1 ou P2) -> adicionar produto 
      - Ir para Privileged Identify Management, inicar o PIM(MFA deve estar ativo), associar ao recurso
         -recursos disponiveis
            - Assign, Activate , Approve , Audit
   
   #### Configurando um PIM para RBAC (necessario Premium)
      - Adicionar Subscription caso necessario para ter acesso a este recurso.
      - Adicionar Role (Billing Reado..VM Contribuitor)
      - adicionar usuario e colocar um intervalo de periodo de acesso, adicao de aprovacoes e etc