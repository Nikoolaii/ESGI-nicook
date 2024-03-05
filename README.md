# Nicook - Recipe Website #

<p align="center">
   <strong>A website made in symfony to find and create reace.</strong>
   <strong>A user can create and add in favorite a recipe</strong>
</p>

<details>
  <summary><strong>➡️ Screenshots</strong></summary>
  <br/>
  <img align="left" src="https://github.com/Nikoolaii/ESGI-nicook/blob/main/img_readme/img1.png" width="280" />
  <img src="https://github.com/Nikoolaii/ESGI-nicook/blob/main/img_readme/img2.png" width="280" />
  <br/>
  <img align="left" src="https://github.com/Nikoolaii/ESGI-nicook/blob/main/img_readme/img3.png" width="280" />
  <img src="https://github.com/Nikoolaii/ESGI-nicook/blob/main/img_readme/img4.png" width="280" />
</details>

### Features 🚀

- 🌐 **Create a recipe**

- 🔄 **View a recipe**

- 📊 **Add a recipe in favorite**

- Future features :

- ✏️ **Editing and delete a recipe**

- 📶 **Admin panel to manage recipe**

## Prerequisites for use 🛠️

- NONE

## Prerequisites for installation 🛠️

- PHP 8.0.X
- MariaDB 10.10.X
- Symfony 7.0.1
- Composer

## How to Run the Project ▶️

1. Clone this repository to your local machine.
2. Modify your database connection information. (`./.env -> DATABASE_URL`).
3. Import file ```db.sql``` to your database (The same name than the ```.env``` file).
4. Do a ```composer i``` to init projet
5. Launch the command to import DataFixtures ```php bin/console doctrine:fixtures:load```.

## Authors ✨

[@Nikoolaii](https://github.com/Nikoolaii)

## License 📄

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
