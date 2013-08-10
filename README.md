# clue/graph-phake

Graph visualization for your `Phakefile`s, to show it a dependency graph.

![example Phakefile dependency graph](http://www.lueck.tv/graph-phake/graph-phake.svg)

## Usage

Once clue/graph-phake is [installed](#install), you can simply invoke it via command line like this:

```bash
$ php graph-phake.php [optional path to your Phakefile]
```

## Install

You can grab a copy of clue/graph-phake in either of the following ways.

### As a phar (recommended)

You can simply download a pre-compiled and ready-to-use version as a Phar
to any directory:

```bash
$ wget http://www.lueck.tv/graph-phake/graph-phake.phar
```


> If you prefer a global (system-wide) installation without having to type the `.phar` extension
each time, you may simply invoke:
> 
> ```bash
> $ chmod 0755 graph-phake.phar
> $ sudo mv graph-phake.phar /usr/local/bin/graph-phake`
> ```
>
> You can verify everything works by just running:
> 
> ```bash
> $ graph-phake
> ```

#### Updating phar

There's no separate `update` procedure, simply overwrite the existing phar with the new version downloaded.

### Manual Installation from Source

This project requires PHP 5.3+, Composer and GraphViz:

```bash
$ sudo apt-get install php5-cli graphviz
$ git clone https://github.com/clue/graph-phake.git
$ cd graph-phake
$ curl -s https://getcomposer.org/installer | php
$ php composer.phar install
```

#### Updating manually
```bash
$ git pull
$ php composer.phar update
```

## License

MIT
