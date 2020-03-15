# Rock Paper Scissors simulator
[![Build Status](https://travis-ci.com/myxobek/rps-simulator.svg?token=X3skejxdzxxuKbFKy2sx&branch=master)](https://travis-ci.com/myxobek/rps-simulator)
[![codecov](https://codecov.io/gh/myxobek/rps-simulator/branch/master/graph/badge.svg?token=EVLS8D8QMB)](https://codecov.io/gh/myxobek/rps-simulator)

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
$ docker run -it --rm rps-simulator vendor/bin/phpunit
```