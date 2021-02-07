abort:
	exit 0
init:
	sudo docker-compose exec phpunit-json-test-case-bundle-fpm composer install
up:
	sudo docker-compose up --detach
down:
	sudo docker-compose down
stop:
	sudo docker-compose stop
connect:
	sudo docker-compose exec phpunit-json-test-case-bundle-fpm bash
