
up-all:
	docker-compose up app -d
	docker-compose up webserver -d
	@make db-up

create-network:
	docker network create teste-tecnico

db-up:
	docker-compose up db -d


app-run:
	docker-compose exec app php -S localhost:8000 router.php --host 0.0.0.0 --port 8000


do-it-all:
	@make app-up
	@make db-up
	@sleep 3
	@make db-up




# mysql zone =========================================================================================================================================================================================


show-db:
	docker-compose exec db sh -c "mysql -u root -p'password' -e 'SHOW DATABASES;'";

show-tables:
	docker-compose exec db sh -c "mysql -u root -p'password' -e 'USE teste_tecnico_db; SHOW TABLES;' ";

drop-dbs:
	docker-compose exec db sh -c "mysql -u root -p'password' -e 'DROP DATABASE teste_tecnico_db'";

query-produtos:
	docker-compose exec db sh -c "mysql -u root -p'password' -e 'USE teste_tecnico_db; SELECT * FROM produtos'";