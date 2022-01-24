-# projeto-titan
 ## Link de download do XAMPP
https://www.apachefriends.org/download.html<br/>
Instale a versão do PHP 7.4 <br/>
![image](https://user-images.githubusercontent.com/51513403/148945018-03dac0c3-b731-417b-9a98-86ce7f934372.png)
![image](https://user-images.githubusercontent.com/51513403/148945351-f13f3b9c-6789-4c08-b4c9-2fe7202c67f0.png)

### Crie um banco de dados 
![image](https://user-images.githubusercontent.com/51513403/150836916-03fe4902-c454-43a3-b049-82695c9f8843.png)

### Crie as tabelas do banco

CREATE TABLE tb_precos(
	IDPRECO INT NOT NULL PRIMARY,
    PRECO FLOAT NOT NULL
);


CREATE TABLE tb_produtos (
	IDPROD INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(40) NOT NULL UNIQUE,
    COR VARCHAR(20) NOT NULL,
    IDPRECO INT NOT NULL DEFAULT -1,
    FOREIGN KEY(IDPRECO) REFERENCES tb_precos(IDPRECO)
);
 
INSERT INTO tb_precos (idpreco, preco) VALUES (-1, 0);

É necessário já ter um registro criado para não dar erro


## Tela Inicial
![image](https://user-images.githubusercontent.com/51513403/150870937-cac4b2c3-ca12-4259-adbb-0299e357a1f0.png)
