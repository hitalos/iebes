#IEBES

##Instalar dependências:
####Dependências do Javascript
`bower install`  
####Dependências do PHP
`composer install`
####Importar Banco de Dados
Executar o script:  
`./extract.sh`

##Em ambiente de produção
####Configurações do apache:
* Habilitar o mod_deflate
* Permitir ao apache ter configurações alteradas por arquivos `.htaccess`

##Em ambiente de desenvolvimento
####Para instalar o grunt

`npm install`

####Para gerar a imagem do docker que executará a aplicação

* Se você tem o `docker-compose`:  
`docker-compose build --no-cache`  
`docker-compose up -d`

* Se você tem apenas o `docker`:  
`docker build --no-cache -t iebes .`  
`docker run -d --name iebes -p 8888:80 -v $PWD:/var/www/localhost iebes`

Obs: Em ambos os casos, o serviço "escutará" na porta **8888**.
