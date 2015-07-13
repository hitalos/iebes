#IEBES

##Em ambiente de produção
####Instalar dependências do bower:

`bower install`

####Configurações do apache:
* Habilitar o mod_deflate
* Permitir ao apache ter configurações alteradas por arquivos `.htaccess`

##Em ambiente de desenvolvimento
####Para instalar o grunt

`npm install`

####Para gerar a imagem do docker que executará a aplicação

`docker build -t iebes .`

####Para criar o container que executará a aplicação

`docker run -d --name iebes -p 8888:80 -v $PWD:/var/www/localhost iebes`

