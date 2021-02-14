# Installing test on Docker <!-- omit in toc -->

<img alt="Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Docker_%28container_engine%29_logo.svg/915px-Docker_%28container_engine%29_logo.svg.png" width="290" height="69" />

test can run with Docker images.

- [Prerequisites](#prerequisites)
- [Use test docker image](#use-test-docker-image)
- [Running the image with docker-compose](#running-the-image-with-docker-compose)

## Prerequisites

You can use [Docker](https://www.docker.com) and [docker-compose](https://docs.docker.com/compose/) to pull or build
and run a test image, complete with a self-contained MySQL database.
This has the nice properties that you don't have to install lots of software directly onto your system, and you can be up and running
quickly with a known working environment.

For any help about how to install Docker, see their [documentation](https://docs.docker.com/install/)

## Use test docker image

The [standard `test` image](https://hub.docker.com/_/test/) can be run with the latest release of test.

Run the container with:

```sh
mysqlCid="$(docker run -d \
 -e MYSQL_RANDOM_ROOT_PASSWORD=true \
 -e MYSQL_DATABASE=test \
 -e MYSQL_USER=homestead \
 -e MYSQL_PASSWORD=secret \
 "mysql:5.7")"
docker run -d \
 --link "$mysqlCid":mysql \
 -e DB_HOST=mysql \
 -p 8080:80 \
 test
```

Wait for the migration db to complete, then go to [http://localhost:8080](http://localhost:8080).

## Running the image with docker-compose

See some examples of docker-compose possibilities in the [example section](https://github.com/testhq/docker/tree/master/.examples).
