# Laravel Portugal 🇵🇹

[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/laravel-portugal/website/run-tests?label=tests)](https://github.com/laravel-portugal/website/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/laravel-portugal/website/Check%20&%20fix%20styling?label=code%20style)](https://github.com/laravel-portugal/website/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-portugal/website.svg?style=flat-square)](https://packagist.org/packages/laravel-portugal/website)

---
This repo will be used to develop & maintain the current website for the Laravel community in Portugal, the project is inspired
on Laravel.io, other community repos and of course our loved contributors from the Portuguese community.
The website aims to be a central repository for useful tips, tricks, & more content in the future aiming to help the Portuguese
developers around the world!
---

## Stack & Features

This project is currently using Laravel 8 with Jetstream + Teams scaffolding with Inertia Stack.
You can find here some cool way to implement features or even start your next big thing, some features include:

- Tailwind + Vue3 Components 🍃
- Docker Deployment 🐳
- Github Actions
- Permissions with Spatie + Inertia
- Translations with Vue i18n + Laravel
- Crawling & Scrapping with Browsershot
- Usage of Actions & Best Pratices
- Testing using Pest 💘

## Installation

You can install the package via composer:

```bash
php -r "copy('.env.example', '.env');"
composer install
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan storage:link
```

## Compile & Publish Assets

Compiling & Publishing assets are done via [Lasso](https://github.com/Sammyjo20/Lasso).
Please refer to Lasso official documentation.

Publish the assets: 
```bash
php artisan lasso:publish
```

Pull the assets on your deployment script:
```bash
php artisan lasso:pull
```

## Testing

```bash
pest
```

## Credits
This project is a merge of a previous [Laravel Portugal Api](https://github.com/laravel-portugal/api)
and [Laravel Portugal Frontend project](https://github.com/laravel-portugal/frontend-2020), that then were
merged into the current repo. Many thanks to all contributors!

- [Alexandre Reis](https://github.com/adevr)
- [Ana Lisboa](https://github.com/ana-lisboa)
- [Daniel Maciel](https://github.com/dleicam)
- [João Patrício](https://github.com/ijpatricio)
- [Jorge Costa](https://github.com/jorgercosta)
- [José postiga](https://github.com/josepostiga)
- [Pedro Martins](https://github.com/igerslike)
- [Pedro Vasconcelos](https://github.com/pedro-vasconcelos)
- [Tiago Fernandes](https://github.com/tiagof)

## Support

Support by helping the project & sending some code! Or share some love and sponsor tools you use daily! <3

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
