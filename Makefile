APP_NAME = revo-solves-app-1
SERVICE_NAME ?= $(APP_NAME)
COMPOSE_FILE = docker-compose.yml

.PHONY: build up run stop down fresh ssh

build:
	docker compose -f ${COMPOSE_FILE} build
up:
	docker compose -f ${COMPOSE_FILE} up

run:
	docker run -it $(SERVICE_NAME)

stop:
	docker compose -f ${COMPOSE_FILE} stop

down:
	docker compose -f ${COMPOSE_FILE} down

fresh: stop down build up

ssh:
	docker exec -it $(APP_NAME) /bin/bash
