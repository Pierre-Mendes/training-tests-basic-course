<img src="https://github.com/Pierre-Mendes/First-Challenge-Bootcamp-Java-DIO/assets/63386178/da4a13ca-375c-4546-99e5-034786980e47" alt="Banner" style="width:100%;" />

---

# Training Tests Basic Course Exercises

![PHP Version](https://img.shields.io/badge/PHP-8.4-blue)
![Docker](https://img.shields.io/badge/docker-257bd6)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/status-finalizado-brightgreen)

This repository contains the solution to some exercises proposed for practicing automated testing with the objective of demonstrating skills in:

> **PHP · Automated Tests · PhpUnit · Good development practices**

## 🎯 Challenge

Creating automated tests to solve the following problems:

- 🔹 `Exercise 1` Multiples of 3 or 5
- 🔹 `Exercise 2` Happy numbers
- 🔹 `Exercise 3` Words in numbers
- 🔹 `Exercise 4` Shipping calculation

## 🚀 Technologies and Tools

- **Language:** PHP `^8.2` (I used version `8.4`)
- **Tests:** PHPUnit
- **Containers:** Docker

### 📦 Libraries
- [`phpunit`](https://phpunit.de/index.html)

### 📁 Project structure:
`/src/:` Root directory project

`/src/Classes:` Classes for testing

`/src/Interfaces:` Interfaces from project

`/src/Services:` Services from project

`/src/tests/:` Automated Tests folder

## 🌐 Structure
```
training-tests-basic-course/
├── src/
│   ├── Classes/
│   │   └── HappyNumberChecker.php
│   │   └── PrimeNumberChecker.php
│   │   └── Product.php
│   │   └── ShoppingCart.php
│   │   └── SumMultiples.php
│   │   └── User.php
│   │   └── WordAnalyzer.php
│   │   └── WordToNumberConverter.php
│   ├── Interfaces/
│   │   └── ShippingInterface.php
│   └── Services/
│       └── CalculateFinalValueService.php
├── tests/
│   └── Exercise1/
│       └── SumMultiplesTest.php
│   └── Exercise2/
│       └── HappyNumberCheckerTest.php
│   └── Exercise3/
│       └── PrimeNumberCheckerTest.php
│       └── WordAnalyzerTest.php
│       └── WordToNumberConverterTest.php
│   └── Exercise4/
│       └── CalculateFinalValueServiceTest.php
│       └── ShoppingCartTest.php
├── composer.json
├── composer.lock
└── phpunit.xml
```

## ✅ Testes
To run automated tests with PHPUnit:
- At the terminal
```sh
./vendor/bin/phpunit
```
- In the docker container
```sh
docker-compose run --rm app ./vendor/bin/phpunit
```
- To run a specific test e.g.:
```sh
./vendor/bin/phpunit tests/Exercise1/SumMultiplesTest.php
```

```sh
docker-compose run --rm app ./vendor/bin/phpunit tests/Exercise1/SumMultiplesTest.php
```

## 🛠️ How to Run the Project

### ⚙️ Requirements:
- Docker and Docker Compose installed
- PHP ^8.2 installed

### 🧭 Step by Step

- Clone Repository
```sh
git clone -b https://github.com/Pierre-Mendes/training-tests-basic-course.git training-tests-basic-course
```

```sh
cd training-tests-basic-course
```

- Upload the project containers
```sh
docker-compose up -d
```

- In the terminal, install the project dependencies
```sh
composer install
```

# 👨‍💻 Author
Made by [`Pierre Mendes Salatiel`](https://github.com/Pierre-Mendes)
