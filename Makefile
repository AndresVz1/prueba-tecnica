# Makefile for Docker setup

.PHONY: build up down migrate

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

migrate:
	docker-compose exec php php bin/console doctrine:migrations:migrate
