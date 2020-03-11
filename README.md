# rps-simulator
Rock Paper Scissors Bot simulator

## Run

Build docker image

```
$ docker build -t rps-simulator .
```

Run simulation with default settings

```
$ docker run -it --rm --name rps-simulator rps-simulator
```

To see all options

```
$ docker run -it --rm --name rps-simulator rps-simulator --help
```

For example, you can change number of repeats

```
$ docker run -it --rm --name rps-simulator rps-simulator --repeats=10000
```

