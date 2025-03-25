# Module Laravel with Auto-Discovery Support

**Module Laravel** is a package designed to organize Laravel's core folders (Routes, Views, Migrations, Seeders, and Factories) into a single module folder. This approach simplifies maintenance and enhances discoverability for modular applications.

## Overview

In traditional Laravel applications, folders are scattered across various directories (e.g., `routes/`, `resources/views/`, `database/migrations/`, etc.). This package consolidates these elements into a unified module structure under a dedicated folder (e.g., `app/Code/YourModuleName`). Key benefits include:

- **Simplified Maintenance:** Centralize module-specific assets for easier management.
- **Enhanced Discoverability:** Quickly locate and manage module-specific resources.
- **Auto-Discovery Support:** Automatically registers service providers using Laravel’s package auto-discovery.

## Features

- **Organized Folder Structure:** Consolidates Routes, Views, Migrations, Seeders, and Factories into a single module folder.
- **Auto-Discovery:** Leverages Laravel’s auto-discovery to register service providers without manual configuration.
- **Dependency Management:** Supports module dependency ordering via an XML configuration file (`module.xml`).
- **Modular Routing and Views:** Enables module-specific routes and views to override or extend default Laravel functionality.
- **Dynamic Resource Loading:** Automatically loads migrations, seeders, and factories for each module.

## Folder Structure

After installation, your module folder structure may resemble the following:

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

The `module.xml` file defines the module name and dependencies, ensuring proper load order.

```plaintext
<?xml version="1.0" ?>
<config>
    <module name="SampleModule"/>
    <sequence>
        <module name="SampleModuleOld"/>
    </sequence>
</config>
```
