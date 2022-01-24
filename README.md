-# projeto-titan
 
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
    IDPRECO INT NOT NULL DEFAULT 1,
    FOREIGN KEY(IDPRECO) REFERENCES tb_precos(IDPRECO)
);
 
INSERT INTO tb_precos (idpreco, preco) VALUES (1, 0);

É necessário já ter um registro criado para não dar erro


## Tela Inicial
![image](https://user-images.githubusercontent.com/51513403/150868036-4233ef49-d569-4a2c-8e84-13e1626ecd53.png)
