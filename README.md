# rps-simulator
Rock Paper Scissors Bot simulator

## Run

Build docker image

```
$ docker build -t rps-simulator .
```

Run simulation with default settings

```
$ docker run -it --rm rps-simulator php app.php
```

To see all options

```
$ docker run -it --rm rps-simulator php app.php --help
```

For example, you can change number of repeats

```
$ docker run -it --rm rps-simulator php app.php --repeats=10000
```

##### Run tests

```
$ docker run -it --rm rps-simulator vendor/bin/phpunit tests
```