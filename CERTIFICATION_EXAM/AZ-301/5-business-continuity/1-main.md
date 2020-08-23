## Azure Site Recovery
     - High Availability
        - converte suas VM ara VHD, e gera uma replica a partir desta imagem...para uso quando necessario(Recovery)
        - Replication Frequency -> a replicacao e configuravel por tempo.
     - Disaster Recovery
        - quando é necessario. esta replica toma lugar do principal. para manter a operação
     - Backup

#### Leitura Complementar - Site Recovery

            Sobre o Azure Site Recovery

            Como uma organização, você precisa adotar uma estratégia de BCDR (continuidade dos negócios e recuperação de desastres) que mantenha seus dados seguros e seus aplicativos e cargas de trabalho online quando ocorrerem interrupções planejadas e não planejadas.

            Os Serviços de Recuperação do Azure contribuem para sua estratégia BCDR:

                Serviço do Site Recovery: O Site Recovery ajuda a garantir a continuidade dos negócios mantendo os aplicativos de negócios e as cargas de trabalho em execução durante interrupções. O Site Recovery replica as cargas de trabalho em execução em máquinas físicas e virtuais (VMs) de um site primário para um local secundário. Quando uma interrupção ocorre no seu site primário, você faz failover para o local secundário e acessa os aplicativos a partir daí. Depois que a localização primária estiver novamente em execução, você poderá fazer failback a ela.

                Serviço de Backup: O serviço Backup do Azure mantém seus dados seguros e recuperáveis.

            O Site Recovery pode gerenciar a replicação para:

                VMs do Azure que replicam entre regiões do Azure.

                VMs locais, VMs do Azure Stack e servidores físicos.