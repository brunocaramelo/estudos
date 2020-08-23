## Virtual Machines
     - Referencias 
        - https://azure.microsoft.com/pt-br/pricing/details/virtual-machines/windows/

### Types
    - A -> BASIC , tipo direcionada para testes e desenvolvimento (por serem bem basicas)
    - B -> BURSTABLE, quando o us de CPU que nao e usado. volta em credito... e quando ncessario e escalavel
    - D -> GENERAL PURPOSE,  Bom para Storage.
    - E -> Memoria otimizada , menor versao tem 16GB.
    - F -> bom potencial de CPU
    - G -> Godzilla, instancias Monstrão
    - H -> High Performance Compute, alto teor de processamento
    - L -> Storage, otimo I/O
    - M -> Large Memory. tem terabytes de memoria RAM
    - N -> GPU
    SAP HANA ->


### Azure Compute Units
- https://docs.microsoft.com/pt-br/azure/virtual-machines/acu
-  Velocidade de processamento

### Adicionado Disco a VM
    
    - ir em Create managed disk 
        - mudar o tipo e deixar um disco maior por exemplo
        - escolher um item da lista disponivel em chance size
        - escolher region e avalibily zone
        - podemos escolher o source tambem sendo: snapshot ou storage blob
        - Finalizar criacao
    - fazendo o attach
        - Por padrao o disco vem com o tipo OS Disc (onde o OS esta instalado)
        - ir a VM desejada...
        - selecionar o menu disk
        - e apertar Add data Disk
        - selecionar o disco criado no passo anterior
        - subir novamente a VM
        - ao final do processo. voce tera um OS Disk e um Data Disk (atachado)

### Disk Caching
    - melhorar desempenho de VHD
    - RAM -> SSD
        -> formatos Premium ou Standard
    - Tipos de cache
        - READ ONLY -> latencia baixo , e mais I/O
        - READ WRITE -> latencia alta , e menos I/O
### Colocando cache no disco
    - IMPORTANTE: não e possibver mudar para Series L e B de VMs
        - necessario mudar o Size da VM para nenhum acima(L e B)

### Entendendo e alterando configuracoes de rede
    - INTRODUCAO
        - tendo em vista que temos o Private e public IP ,o Azure cria um  NIC (Network interface cart), que recebe enderecamento publico e privado, pode ser apenas privado
        - enderecamento publico Intenet , privado...uso interno
    - EXECUCAO
        - ir para VM escolhida
        - selecionar Network
        - ao ver temos NIC public e NIC private e status do Accelerated networking
        - clicar no link do topo da pagina (Network Interface: [[NOME_AQUI]] )
        - é possivel mover esta NIC para outra VM na opçao mover
        - ao clicar no ipconfig1(nome padrao), e possivel ver as opcoes
            - desabilitar IP Publico..criar um novo.. usar de outra VM, sem uso
            - para criar basta criar um novo com outo nome
            - o IP privados pode ser altrado para estatico
            - Possivel trocar tb o DNS Server e Network security groups

### Avalibily set
    - plano de contigencia
    - Fault Domain
        - tem 2 domains (que é um rack)
        - usado para desastres
    - Update Domain
        - temos ate 20
        - usado para atualizacao de seguranca e estatico
        - e seu ambiente é trocado de um rack para outro

### Avalibily set execucao
    - ir ao Menu Avalibily set
    - criar um avalibily set
        - selecionar o resource group : VirtualMachines
        - deixar na mesma localizacao por praticidade
        - Fault Domains de acordo com a quanitdade de VMs
        - Update Domains de acordo com a quanidade de VMs
    - criar as VMs
        - selecionar o recurso de Avaliabilty options >> Avalaiabily set com o resource, (deve estar no mesmo Resource group das VMs)
        - Resultado pos criacao abaixo:
        
        NAME      STATUS  FAULT DOMAIN   UPDATE DOMAIN
        vm01avab  Running      0                 0
        vm02avab  Running      1                 1

### Scaling VM
    - Scaling set
        -> auto Scale
            -> por AVG (media do total no ar)
            -> definimos o minimo = 2 exemplo , usando CPU (por aplicacao..customizavel)
            -> definimos o maximo = 6 exemplo

### Scaling VM (confiurando)
    - Ir para >> Virtual machine scale sets
        -> configurar
            -> selecionar resource group. dar nome, selecionar imagem(Centos 8)
            -> configurar regras de scale(deixar em custom)
                -> configurar minimo de instancias (2) e maximo(4) por exemplo
                -> Scale IN : CPU threshold (%) 25 , Number of VMs to decrease by: 1
                -> Scale OUT : CPU threshold (%) 75 , Number of VMs to encrease by: 1
            -> usar ou nao um Load Balancer


