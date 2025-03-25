# Module Laravel

**Module Laravel** is a package designed to streamline Laravel's core folder structure by consolidating Routes, Views, Migrations, Seeders, and Factories into a single module folder. This approach simplifies maintenance and improves discoverability for modular applications.

## Overview

In traditional Laravel applications, core folders are distributed across multiple directories (e.g., `routes/`, `resources/views/`, `database/migrations/`, etc.). This package centralizes these components into a unified module structure under a dedicated folder (e.g., `app/Code/YourModuleName`). Key advantages include:

- **Simplified Maintenance:** Centralize module-specific assets for easier management.
- **Improved Discoverability:** Quickly locate and manage module-specific resources.
- **Auto-Discovery Support:** Automatically registers service providers using Laravel’s package auto-discovery feature.

## Features

- **Organized Folder Structure:** Groups Routes, Views, Migrations, Seeders, and Factories into a single module folder.
- **Auto-Discovery:** Utilizes Laravel’s auto-discovery to register service providers without manual configuration.
- **Dependency Management:** Supports module dependency ordering through an XML configuration file (`module.xml`).
- **Modular Routing and Views:** Allows module-specific routes and views to override or extend default Laravel functionality.
- **Dynamic Resource Loading:** Automatically loads migrations, seeders, and factories for each module.

## Folder Structure

After Laravel installation, your module folder structure will look like this:

```plaintext
app/
└── Code/
    └── YourModuleName/
        ├── module.xml
        ├── Routes/
        │   ├── web.php
        │   └── api.php
        ├── Views/
        │   └── index.blade.php
        ├── Database/
        │   ├── Migrations/
        │   │   └── 2021_01_01_000000_create_example_table.php
        │   ├── Seeders/
        │   │   └── ExampleSeeder.php
        │   └── Factories/
        │       └── ExampleFactory.php
        ├── Controllers/
        │   └── YourModuleController.php
```

This structure organizes all module-specific assets under a single folder, simplifying management and maintenance. Each subfolder serves a specific purpose:

- **module.xml:** Contains metadata and dependencies for the module.
- **Routes:** Includes route files (`web.php` and `api.php`) for module-specific routes.
- **Views:** Stores Blade templates for the module.
- **Database:** Contains subfolders for migrations, seeders, and factories to handle database-related tasks.
- **Controllers:** Houses controllers for managing HTTP requests.

## Module Configuration

The module must reside within the folder: `app/Code/YourModuleName`, and it must include a `module.xml` file with the same name as the folder. Below is an example:

```xml
<?xml version="1.0" ?>
<config>
    <module name="SampleModule"/>
</config>
```

### Module Dependency Sequence

If you need a module to execute after another, you can define the sequence in the `module.xml` file as shown below:

```xml
<?xml version="1.0" ?>
<config>
    <module name="SampleModule"/>
    <sequence>
        <module name="SampleModuleOld"/>
    </sequence>
</config>
```

This ensures that `SampleModule` will execute after `SampleModuleOld`.
