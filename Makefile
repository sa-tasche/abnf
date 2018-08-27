PATH := vendor/bin:$(PATH)
.PHONY: clean dev-env no-dev-env unit-test

clean:
	@echo "\033[0;33m>>> Cleaning workspace\033[0m"
	rm -rf vendor tmp composer.lock phpunit.xml

dev-env:
	@echo "\033[0;33m>>> Prepare workspace for development\033[0m"
	composer install --no-interaction --prefer-source

no-dev-env:
	@echo "\033[0;33m>>> Prepare workspace for production\033[0m"
	composer install --no-dev --no-interaction --prefer-source

unit-test:
	@echo "\033[0;33m>>> Running unit tests\033[0m"
	phpunit