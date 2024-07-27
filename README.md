# Flow

Flow is a comprehensive web application development starter kit designed to accelerate the process of building modern and feature-rich web applications. With a focus on simplicity, flexibility, and efficiency, Flow provides developers with a robust set of tools and features to kickstart their projects. From secure authentication and seamless API integration to beautifully designed UI/UX components and powerful admin tools.

Flow's purpose is empower developers to create high-quality web applications with ease. Whether you're a seasoned developer or just starting out, Flow streamlines the development process, allowing you to focus on creating exceptional user experiences and delivering value to your users.

<p align="center">
  <img src="https://raw.githubusercontent.com/ibnsultan/flow/8bbb403b537ca99ff7a602e1dc6eab5802c8d6a1/storage/uploads/brand/banner.svg" width="500">
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
composer require ibnsultan/flow <PROJECT_NAME>
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

**NOTE:** Flow is under active development so in the meantime there will be alot of updated involving breaking changes
