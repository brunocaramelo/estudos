## Entendendo redes
	
### listando redes

	docker network ls


## Docker GW bridge

	docker create network --subnet 172.30.0.0/15 --opt com.docker.network.bridge.name=docker_gwbridge_mano --opt com.docker.network.bridge.enable_icc=false dockergwbridgemano


### Criando rede Bridge

	docker network create --driver bridge isolated_nw

### Inspecionando rede Bridge

	docker network inspect isolated_nw

### Criando conteiner com rede
