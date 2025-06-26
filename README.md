# RestFull API

Project UAS Beckend membuat RestFull API menggunakan Laravel Version 10.x

## Anggot Kelompok

-   [@GungNanda-230040028](https://www.github.com/zeppyx13)
-   [@Oka-230040018](https://www.github.com/tuoka16)
-   [@Dewa-230040026](https://www.github.com/DwDhrm7)
-   @Ramanda-230040052

## Deployment

Untuk memulai Project ini clone Repository ini

```bash
  git clone https://github.com/zeppyx13/RestFull-API.git
```

### Setup Laravel

Copy env file

```bash
  cp .env.example .env
```

Generate Key:

```bash
  php artisan key:generate
```

### Setup Data Base

Atur env file pada database lalu lakukan

```bash
  php artisan migrate:fresh --seed
```

## API Reference

User Super Admin

#### Email : gn.nanda0@gmail.com

#### Password: Admin#1234

## Base URL

```http
  http://localhost:8000/api
```

## Admin Endpoint

Endpoint admin dapat melakukan Regsiter,Login, dan cek user yang login. Login disini sangat penting untuk mendapat Token,yang berfungsi untuk Student Endpoint.

### Register

```http
  POST /auth
```

| Parameter  | Type     | Description                     |
| :--------- | :------- | :------------------------------ |
| `email`    | `string` | **Required**. Email Pengguna    |
| `password` | `string` | **Required**. Password Pengguna |
| `name`     | `string` | **Required**. Nama Pengguna     |

#### Exemple Output:

Succes:

```JSON
{
    "data": {
        "id": 2,
        "email": "gungnands@gmail.com",
        "name": "Gung Nanda"
    }
}
```

Error:

```JSON
{
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    }
}
```

### Login

```http
  POST /auth/login
```

| Parameter  | Type     | Description                     |
| :--------- | :------- | :------------------------------ |
| `email`    | `string` | **Required**. Email Pengguna    |
| `password` | `string` | **Required**. Password Pengguna |

#### Exemple Output:

Succes:

```JSON
{
    "data": {
        "id": 1,
        "email": "gn.nanda0@gmail.com",
        "name": "Gung Nanda",
        "token": "b82e21a9-720d-4b6d-80b3-efd7d437609a"
    }
}
```

Error:

```JSON
{
    "errors": {
        "message": [
            "email or password wrong"
        ]
    }
}
```

### Get Current User

```http
   GET /auth/me
```

sertakan Token yang di dapat saat login pada Header Authorization

#### Exemple Output:

Succes:

```JSON
{
    "data": {
        "id": 1,
        "email": "gn.nanda0@gmail.com",
        "name": "Gung Nanda",
        "token": "b82e21a9-720d-4b6d-80b3-efd7d437609a"
    }
}
```

Error:

```JSON
{
    "errors": {
        "message": [
            "unauthorized"
        ]
    }
}
```

## Student Endpoint

Endpoint Student ini dapat melakukan CRUD Student. Sebelum dapat melakukan akses ke Endpoint ini harus login untuk mendapatkan token Authorization, yang diletakan pada Header.
![Header SS](https://gungnanda.com/nota/assets/img/img1.png)

### Get All Student

```http
   GET /students/
```

Sertakan Token yang di dapat saat login pada Header Authorization

#### Exemple Output:

Succes:

```JSON
[
    {
        "id": 1,
        "nim": "230040269",
        "email": "jagaraga.palastri@example.com",
        "name": "Rusman Mahendra",
        "address": "Psr. Acordion No. 631, Makassar 39388, Sumsel",
        "created_at": "2025-06-26T08:01:35.000000Z",
        "updated_at": "2025-06-26T08:01:35.000000Z"
    },
    {
        "id": 2,
        "nim": "230040235",
        "email": "intan35@example.net",
        "name": "Nugraha Saputra",
        "address": "Psr. Tangkuban Perahu No. 735, Pematangsiantar 95581, Kalbar",
        "created_at": "2025-06-26T08:01:35.000000Z",
        "updated_at": "2025-06-26T08:01:35.000000Z"
    }
]
```

Error:

```JSON
{
    "errors": {
        "message": [
            "unauthorized"
        ]
    }
}
```

### Get Student By NIM

```http
   GET /students/{nim}
```

Exemple hit endpoint:

```http
   http://localhost:8000/api/students/230040028
```

Sertakan Token yang di dapat saat login pada Header Authorization

#### Exemple Output:

Succes:

```JSON
{
    "data": {
        "nim": "230040028",
        "email": "Zayuran@gmail.com",
        "name": "Gung Nanda",
        "address": "Jln Tangkubhan Perahu Blok 1 NO 16f"
    }
}
```

Error:

```JSON
{
    "errors": {
        "NIM": [
            "NIM not found"
        ]
    }
}
```

### Create Student

```http
   POST /students/
```

Sertakan Token yang di dapat saat login pada Header Authorization
| Parameter | Type | Description |
| :-------- | :------- | :------------------------- |
| `nim` | `string` | **Required**. Nim Mahasiswa |
| `email` | `string` | **Required**. Email Mahasiswa |
| `name` | `string` | **Required**. Nama Mahasiswa |
| `addres` | `string` | **Required**. Alamat mahasiswa |

#### Exemple Output:

Succes:

```JSON
{
    "data": {
        "nim": "230040028",
        "email": "Zayuran@gmail.com",
        "name": "Gung Nanda",
        "address": "Jln Tangkubhan Perahu Blok 1 NO 16f"
    }
}
```

Error:

```JSON
{
    "errors": {
        "nim": [
            "The nim has already been taken."
        ],
        "email": [
            "The email has already been taken."
        ],
        "address": [
            "The address field is required."
        ]
    }
}
```

### Update Student

```http
   Put /students/{nim}
```

Exemple hit endpoint:

```http
   http://localhost:8000/api/students/230040028?name=Gung Nanda
```

Sertakan Token yang di dapat saat login pada Header Authorization
| Parameter | Type | Description |
| :-------- | :------- | :------------------------- |
| `nim` | `string` | Nim Mahasiswa |
| `email` | `string` | Email Mahasiswa |
| `name` | `string` | Nama Mahasiswa |
| `addres` | `string` | Alamat mahasiswa |

#### Exemple Output:

Succes:

```JSON
{
    "data": {
        "nim": "230040028",
        "email": "Zayuran@gmail.com",
        "name": "Gung Nanda",
        "address": "Jln Tangkubhan Perahu Blok 1 NO 16f"
    }
}
```

Error:

```JSON
{
    "errors": {
        "name": [
            "The name field must be a string."
        ]
    }
}
```

### Delete Student

```http
   Delete /students/{nim}
```

Exemple hit endpoint:

```http
   http://localhost:8000/api/students/230040028
```

#### Exemple Output:

Succes:

```JSON
{
    "message": "Student deleted successfully"
}
```

Error:

```JSON
{
    "error": "Student not found"
}
```

## Badges

License:

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)
