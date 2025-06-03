
# 🗑️ Laravel Delete Image Demo

This Laravel project demonstrates how to upload and delete images from both the filesystem and database. Useful for user profile management, admin panels, and gallery features.

## 📦 Features

- 🖼️ Upload images with form validation
- 🗂️ Store image data in the database
- ❌ Delete images from storage and remove DB record
- 📁 Uses Laravel Storage (`public` disk)

## 🚀 Getting Started

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/laravel-delete-image-demo.git
   cd laravel-delete-image-demo
````

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Set up environment:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Run migrations:

   ```bash
   php artisan migrate
   ```

5. Start local server:

   ```bash
   php artisan serve
   ```

## 🛠️ Tech Stack

* Laravel 10+
* Blade Templating
* Bootstrap (if used)
* Laravel Filesystem

## 🧪 Usage

* Navigate to the image upload page
* Upload an image
* View uploaded images in a list
* Click delete to remove the image and its database record

## 📄 License

Free to use and customize for personal or commercial use.


