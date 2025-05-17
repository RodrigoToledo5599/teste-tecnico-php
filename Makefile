

app-up:
	docker-compose up db -d
	docker-compose up app -d
	docker-compose up webserver -d

create-network:
	docker network create teste-tecnico

db-up:
	docker-compose up db -d


app-run:
	docker-compose exec app php -S localhost:8000 router.php --host 0.0.0.0 --port 8000



create-db:

	docker-compose exec db sh -c "mysql -u root -p'password' -e 'CREATE DATABASE IF NOT EXISTS teste_tecnico_db';
	