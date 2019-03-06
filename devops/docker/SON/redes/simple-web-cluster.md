## Criando Swarm simples de aplicaco web
	
### inicando o swarm

		docker swarm ini --advertise-add=127.0.0.1

### Criando o simples serviço

		docker service create -d --replicas=2 --name devteste-service --mount source=myvol2,target=/app nginx:latest

### Removendo estes servicos
		
		docker service rm devteste-service

### Criando um conteiner de volume

		docker run -d -it -v nginx-vol2:/usr/share/nginx/html --name=vol-nginx nginx:latest
		
### Criando um conteiner de volume, apenas leitura

		docker run -d -it -v nginx-vol2:/usr/share/nginx/html,readonly --name=vol-nginx nginx:latest

### Inspecionando acima
	
		docker inspect vol-nginx

### Subindo com o muito do continer acima (vol-nginx)

	docker run -d -it --name devtestemano -v "$(pwd)"/target:/app nginx:latest

	logando nele

	docker exec -it devtestemano /bin/bash

### Volume temporario

	docker run -d -it --name tmptest --tmpfs /app:rw,size=787448k nginx:latest
