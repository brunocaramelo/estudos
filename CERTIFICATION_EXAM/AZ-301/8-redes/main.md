## VNET
    -Proposta de projeto de uma micro-rede
    - Resource Group - recurso grande que deve contemplar as redes e suas Subnets
        - VNET de projetos (ProjetosVnet) - 172.16.0.0/16
            - Subnet (A) - 172.16.1.0/24
            - Subnet (B) - 172.16.2.0/24
    - Depois configurar o enderecamento

### Configurando VNET
    - Criar resource group chamado Network
    - criando um rede virtual >> virtual Networks (criar)
        - criar um nome (projetoVnet)
            - criar um Address Space(172.16.0.0/16)
            - adicionar um Subnet (SubnetAWebServers) - Address range(172.16.1.0/24)
            - ir ao recurso criado e ver o menu Subnets  veremos: SubnetAWebServers IPv4Avaliable (251)
            - adicionar um Subnet (SubnetBApps) - Address range(172.16.2.0/24)
            
## Enderecamento IP
    - Enderecamento IPV4 (32 bits) -> 4.6 bilhoes
    - Enderecamento IPV6 (128 bits) -> 10 decac
    
    - Exemplo bem simples mais util sobre enderecamento IP
        - Private
            Ranges
            - Classe A
                10.0.0.0 -> 10.255.255.255
            - Classe B
                172.16.0.0 -> 172.31.255.255
            - Classe C
                192.168.0.0 -> 192.168.255.255
                
        - Public
            Tudo que não e privado
            -> exemplo :
                8.8.8.8
                11.128.1.2
## Testando redes
    Criando VMs abaixos das Subnets
        - criar uma VM NUMERO 1 usando o resource group (NetworkGroup)
        - em redes...deixar em SubnetAWebServers
        - criar uma VM NUMERO 2 usando o resource group (NetworkGroup)
        - em redes...deixar em SubnetBApps
        - Apos criar...devemos ver o detalhe de rede da VM (ir para VM> Network)
        - A VM 1 (172.16.1.5/24) e VM 2(172.16.2.4/24)
        - ambas irao se comunicar pois o Inbound e Outbound sao liberados para tudo
## Criando um VNET no Powershell
    - Abrir Powershell
    - az network vnet create --name projetovnet2 --resource-group networkgroup --subnet-name subc

## Roteamento Teoria
    -o roteamento de internet é feito pelo Internet Gateway
    - a conexao Entre Subnets e feita por Implicit Routing usando regras de Inbound/Outbound
    - a conexao de uma VNET com o rede de um empresa (Fisica) e feito por VNET Gateway
    - Para Envio a um Firewall virtual por exemplo de trafego para a internet e possivel criar um User Define Routing
## Roteamento Pratico
    - ir para Route Tables
        - criar tabela de roteamento chamando de (Routing-firewall)
        - acessando recurso e adiconar rota >> Route
        - adicionando uma rota
            - Route name : internet-via-firewall, Address prefix: 0.0.0.0/0, Next hop type: virtual Appliance, Next hop Address: 172.16.10.1
        - associar regra
            - ir para o menu Subnets
                - selecionar associar VNET: projetoVnet e subnet: SubnetAWebServers

## Peers
    - Peering e a comunicao entr subnets em VNETS diferentes
    - acessar a VM SubC (SUBNET) de projetoVnet2
        - tentar acessar o VM da projetoVnet e ver que nao funciona
    - ir para projetoVnet e selecionar Perrings e criar um
        - Selecionar virtual Network: (projetoVnet2) que quero me conectar
        - Name of preering from ProjetosVnet2 to ProjetosVnet: Vnet2paraVnet1 
    - testar a conexao entre as VMs instaladas. sendo conectadas corretamente

### Network Security Groups
    - Firewall (Network Filter)
    - Permitir ou bloquear um trafego
        - Protocolo
        - Port Number
        - Source / Dest IP Address
    - Aplicar Regras: Inbound / Outbound
    - para VM as Network Security Group. pode fica na NIC
    - Pode ficar tambem na Subnet
    - Exemplo de trafego de uma VM para outra em diferentes Subnets
        - Sai pelo Outbound da VM
        - Sai pelo Outbound da Subnet
        - Entra pelo Inbound da Subnet
        - Entra pelo Inbound da VM

## Load Balance 
    - Layer 4
    - Probes
    - Auto reconfiguration
    - Hash Based Distribuition
        - S tuple hash
        - Source IP 
        - Dest IP 
        - Source Port 
        - Dest Port
        - Protocol
### Preparando um load balancer simples
    - Ir para resource groups e criar
        - criar com nome werbserverApp
    - Criar Virtual network
        - criar VNET
            - Resource Group : werbserverApp
            - nomear: vnetwebserverapp
            - addres Space: 172.16.0.0/16
            - Adicionar Subnet
                - Name: SubWeb
                - Address Range: 172.16.20.0/24
    - Criar VM - 1
        - nome : web1
        - avalability set : avalalitwebServerApp (nova)
        - resource group : webserverapp
        - select Inbound ports : habilitar SSH (22) e HTTP(80)
        - na sessao Network Interface:
            - selecionar Network: vnetwebserverapp
            - selecionar Subnet: subweb(172.16.20.0/24)
            - Inbound Ports : HTTP (80) e SSH (22)
        - na sessao Advanced
            - Preencher  Custom Data:
                #!/bin/bash
                sudo apt update -y
                sudo apt install apache2 -y
                sudo chmod -R 777 /var/www/html/index.html
                cd /var/www/html/
                echo "<html><h1> Webserver 1 -  Funcionando </h1></html>" > index.html
    - Criar VM - 2
        - nome : web2
        - avalability set : avalalitwebServerApp (nova)
        - resource group : webserverapp
        - select Inbound ports : habilitar SSH (22) e HTTP(80)
        - na sessao Network Interface:
            - selecionar Network: vnetwebserverapp
            - selecionar Subnet: subweb(172.16.20.0/24)
            - Inbound Ports : HTTP (80) e SSH (22)
        - na sessao Advanced
            - Preencher  Custom Data:
                #!/bin/bash
                sudo apt update -y
                sudo apt install apache2 -y
                sudo chmod -R 777 /var/www/html/index.html
                cd /var/www/html/
                echo "<html><h1> Webserver 2 -  Funcionando </h1></html>" > index.html

### Configurando um load balancer simples
    - Ajuste 1 - retirar o acesso a internet dos Web servers
        - Ir a VM >> Networks >> Network Interface: <LINK AQUI> (ver se e para acessar o link do ip publico e desasociar)
    - Criando um recurso Load Balance
        - ir para o recurso Load Balance e criar:
            - Resource Group: webserverapp
            - Nome: LoadBalancerApp
            - Public Name IP address name: LoadBalancerAppIp
        - ir para recurso criado para configuracao:
            - Configurando Front End : 
            - Configurando Back End Pool :
                - name: backendwebserverApp
                - Virtual Network: vnetwebserverapp
                - Associeted to: Virtual machines
                    - Add: web3app + web1app
            - Configurando Health Probes (monitoriamento para o pool):
                - Name : healthforwebserver
                - Protocol : HTTP no caso
                - Port : 80
                - Path : / (ou uma melhor, especifica)
                - Interval (intervalo de checagem): 5
                - Unhealthy threshould (verificar quantas vezes ele tolera falha): 2
            - Configurando Load balancing rules:
                - Name: LoadBalanceWebApp
                - IP version: V4
                - FrontendIP addres: LoadBalancerFontEnd
                - Port: 80
                - Backend Port: 80
                - Backend Pool : 2 vms 
                - Health probe : healthforwebserver
                - Session Persistence : none (opcoes . Client Ip e Client IP e Protocol) 
        - Ao verificar de browsers ou maquinas diferentes podemos notar que a mensagem ao acessar http://52.142.40.142/
            - Webserver 3 - Funcionando OU Webserver 1 - Funcionando
