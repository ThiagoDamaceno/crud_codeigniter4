# Execução da api

<br>

<p>Criação do postgreSQL com o docker. No diretório ./backend</p>

```
sudo docker-compose up
```

<br>

<p>Execução das migrations. No diretório ./backend</p>

```
php spark migrate
```

<br>

<p>Execução do servidor. No diretório ./backend/public</p>

```
php -S localhost:8080
```

<br>

# Instalação do Php (linux).

<br>

```
sudo apt update && sudo apt upgrade
```

```
sudo apt install software-properties-common
```

```
sudo apt update
```

```
sudo add-apt-repository ppa:ondrej/php
```

```
sudo apt install php7.4
```

```
sudo apt-get install curl
```

```
sudo apt-get install php7.4-curl
```

```
sudo apt install php7.4-xml
```

```
sudo apt install php7.4-mbstring
```

```
sudo apt install zip unzip php-zip
```

```
sudo apt install php7.4-pgsql
```

```
cd ~
```

```
curl -sS https://getcomposer.org/installer -o composer-setup.php
```

```
HASH=`curl -sS https://composer.github.io/installer.sig`
```

```
echo $HASH
```

```
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
```

```
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

```
sudo nano /etc/php/7.4/cli/php.ini
```

<p>Remover ";" de ;extension=intl</p>
<p>Remover ";" de ;extension=intl</p>
<p>Remover ";" de ;extension=curl</p>
<p>Remover "#" de #extension=pdo_pgsql</p>

<br>

```
sudo service apache2 restart
```