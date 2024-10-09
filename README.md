# Flow

Check out the [wiki](https://github.com/ibnsultan/flow/wiki)

**NOTE:** Flow is under active development so in the meantime there will be alot of updated involving breaking changes

For a more minimal kit please refere to: [Leaf Origin](https://github.com/leafsphp/origin)

Flow is a comprehensive web application development starter kit designed to accelerate the process of building modern and feature-rich web applications. With a focus on simplicity, flexibility, and efficiency, Flow provides developers with a robust set of tools and features to kickstart their projects. From secure authentication and seamless API integration to beautifully designed UI/UX components and powerful admin tools.

Flow's purpose is empower developers to create high-quality web applications with ease. Whether you're a seasoned developer or just starting out, Flow streamlines the development process, allowing you to focus on creating exceptional user experiences and delivering value to your users.

<p align="center">
  <img src="https://raw.githubusercontent.com/ibnsultan/flow/b696f2a9b570452a589ec39d6eec600eb2313754/storage/app/public/brand/banner.svg" width="700">
<p>

## Features

- [X] Access and Authentication
  - [X] Basic Auth: login, register, etc
  - [X] Granular Permission
- [X] Announcements and Notification
- [X] Blogging & CMS
- [X] API & developer tools (Experimental)
  - [X] API Keys Issue
  - [X] API requests monitor
- [X] Profile management
- [X] Mailing

## Installation

```bash
composer create-project ibnsultan/flow:dev-main <PROJECT_NAME>
```

```bash
composer install
```

## Configuration

Setup your environment configurations and run the following command to install migrations and seeders

```bash
php leaf db:migrate
php leaf db:seed
```

## Usage

The default login credentials are:

- Email: `admin@flow.app`
- Password: `password`

## Credits

Without the following projects flow would never have been elegant as it is

- Leaf Framework - [https://leafphp.dev/](https://leafphp.dev/)
- AblePro Dashboard - [https://github.com/phoenixcoded/able-pro-free-admin-dashboard-template](https://github.com/phoenixcoded/able-pro-free-admin-dashboard-template)
- Bootstrap 5 - [https://getbootstrap.com/](https://getbootstrap.com/)
- Icons
  - Font Awesome
  - Phosphor
  - Feather Icon
