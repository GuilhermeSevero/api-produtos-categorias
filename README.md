# API - Sistema Manutenção de Produtos e Categorias
> Deverá ser desenvolvido um sistema que permita ao usuário manter produtos e suas categorias. Dentre os requisitos de negócio para essa tarefa estão:

1. CRUD de categorias de produto: Cadastrar categoria, alterar categoria, listar categorias e excluir categoria.

2. CRUD de produtos: Cadastrar produto, alterar produto, listar produto e excluir produto.

---

## Environments

Deve-se seguir o modelo apresentado em: `.env.example`

---
## Execução - DEV:
```sh
$ git clone https://github.com/GuilhermeSevero/api-produtos-categorias.git
$ cd api-produtos-categorias

# Executa serviço da API
$ php artisan serve
```

---
## Execução - Homestead:
```sh
$ git clone https://github.com/GuilhermeSevero/api-produtos-categorias.git
$ cd api-produtos-categorias

# Levando em consideração que as configurações de pasta e site já foram feitas
$ .\homestead.bat up
```

---

# Endpoints

>- **GET** /categorias
>- **GET** /categorias/:id
>- **POST** /categorias
>- **PUT** /categorias/:id
>- **PATCH** /categorias/:id
>- **DELETE** /categorias/:id

>- **GET** /produtos
>- **GET** /produtos/:id
>- **POST** /produtos
>- **PUT** /produtos/:id
>- **PATCH** /produtos/:id
>- **DELETE** /produtos/:id

---

# Exemplos de Uso

# Categorias
- **GET** /categorias
  - Pega Lista de Categorias

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |

**Params**:
|     Key        |                     Description                |
| :------------: | ---------------------------------------------- |

```http
GET http://127.0.0.1:8000/categorias
```

**Response:**
```json
{
    "data": [
        {
            "id_categoria_produto_planejamento": 2,
            "nome_categoria": "Bazar"
        }
        ...
    ]
}
```
- **GET** /categorias/:id
  - Pega Categoria pelo ID

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Response:**
```json
{
    "data": {
        "id_categoria_produto_planejamento": 2,
        "nome_categoria": "Bazar"
    }
}
```
- **POST** /categorias
  - Insere nova Categoria

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Body:**
```json
{
    "nome_categoria": "Bazar"
}
```

**Response:**
```json
{
    "data": {
        "id_categoria_produto_planejamento": 2,
        "nome_categoria": "Bazar"
    }
}
```

- **PUT** /categorias/:id
  - Altera categoria pelo ID

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Body:**
```json
{
    "nome_categoria": "Bazar - alterado"
}
```

**Response:**
```json
{
    "data": {
        "id_categoria_produto_planejamento": 2,
        "nome_categoria": "Bazar"

```

- **PATCH** /categorias/:id
  - Altera categoria pelo ID (Parcial)

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Body:**
```json
{
    "nome_categoria": "Bazar - alterado"
}
```

**Response:**
```json
{
    "data": {
        "id_categoria_produto_planejamento": 2,
        "nome_categoria": "Bazar"

```

- **DELETE** /categorias/:id
  - Deleta categoria pelo ID

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Response:**
```json
[]
```


# Produtos
- **GET** /produtos
  - Pega Lista de Produtos

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |

**Params**:
|          Key           |             Description                          |
| :--------------------: | ------------------------------------------------ |
|  id_categoria_produto  |  ID da Categoria do Produto                      |
|  nome_produto          |  Nome do Produto (LIKE)                          |
|  expand                |  Habilita a Expanção da Categoria (true/false)   |

```http
GET http://127.0.0.1:8000/categorias?id_categoria_produto=2&nome_produto=Brinqued&expand=true
```

**Response:**
```json
{
    "data": [
        {
            "id_produto": 2,
            "id_categoria_produto": 2,
            "data_cadastro": "2020-04-05 00:55:17",
            "nome_produto": "Brinquedinho",
            "valor_produto": 0.99,
            "categoria": {
                "id_categoria_produto_planejamento": 2,
                "nome_categoria": "Bazar"
            }
        }
        ...
    ]
}
```
- **GET** /produtos/:id
  - Pega Produto pelo ID

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Response:**
```json
{
    "data": {
        "id_produto": 2,
        "id_categoria_produto": 2,
        "data_cadastro": "2020-04-05 00:55:17",
        "nome_produto": "Brinquedinho",
        "valor_produto": 0.99,
        "categoria": {
            "id_categoria_produto_planejamento": 2,
            "nome_categoria": "Bazar"
        }
    }
}
```
- **POST** /produtos
  - Insere novo Produto

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Body:**
```json
{
    "id_categoria_produto": 2,
    "nome_produto": "Brinquedinho",
    "valor_produto": 9.99
}
```

**Response:**
```json
{
    "data": {
        "id_produto": 2,
        "id_categoria_produto": 2,
        "data_cadastro": "2020-04-05 00:55:17",
        "nome_produto": "Brinquedinho",
        "valor_produto": 0.99
    }
}
```

- **PUT** /produtos/:id
  - Altera produto pelo ID

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Body:**
```json
{
    "id_categoria_produto": 2,
    "nome_produto": "Brinquedo",
    "valor_produto": 9.99
}
```

**Response:**
```json
{
    "data": {
        "id_produto": 2,
        "id_categoria_produto": 2,
        "data_cadastro": "2020-04-05 00:55:17",
        "nome_produto": "Brinquedo",
        "valor_produto": 9.99
    }
}
```

- **PATCH** /produtos/:id
  - Altera produto pelo ID (Parcial)

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |



**Body:**
```json
{
    "nome_produto": "Brinquedo",
}
```

**Response:**
```json
{
    "data": {
        "id_produto": 2,
        "id_categoria_produto": 2,
        "data_cadastro": "2020-04-05 00:55:17",
        "nome_produto": "Brinquedo",
        "valor_produto": 9.99
    }
}
```

- **DELETE** /produtos/:id
  - Deleta produto pelo ID

**Header:**
|     Key        |      Value         |
| :------------: | ------------------ |
|  Content-Type  |  application/json  |


**Response:**
```json
[]
```
