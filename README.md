
#  eShop Ecommerce 
A e-commerce platform built with Laravel 10 for selling products. The website allows users to easily browse and search for products by categories, brands, and various attributes. It includes detailed product information, user reviews, and a secure checkout process. Admins can manage product listings, categories, customer data, and orders through an intuitive dashboard. The platform supports seamless order management, real-time notifications, and secure payment processing to ensure a smooth shopping experience for customers.
## Requirements

- **Composer**: For managing PHP dependencies.
- **Database**: MySQL, PostgreSQL, SQLite, or SQL Server. Ensure the corresponding PHP extension is installed.
- **Web Server**: Apache or Nginx.
- **Git**: For version control.

For installation of PHP extensions on Ubuntu/Debian-based systems, use:

## Installation

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/mdabdullajobayer/point_of_sale.git
    ```
    ```bash
    cd point_of_sale
    ```
2. **Install Dependencies**
    ```bash
    composer install
    ```
3. **Set Up Environment Variables**: Copy the `.env.example` file to `.env` and update the necessary environment variables.
    ```bash
    cp .env.example .env
    ```
4. **Run Migrations**: Set up the database tables.
    ```bash
    php artisan migrate
    ```
5. **Serve the Application**: Start the Laravel development server.
    ```bash
    php artisan serve
    ```

## Project Dependencies

This project includes various dependencies. Here’s a summary of the main components:

- **Laravel Framework**: ^10.0
- **PHP**: ^8.1
- **barryvdh/laravel-dompdf**: ^3.0 (PDF generation)
- **firebase/php-jwt**: ^6.10 (JWT authentication)

For full details, refer to the `composer.json` file located in the project root.

## Routes

### Web Routes

| HTTP Method | URI           | Controller                | Method          | Description                                    |
|-------------|---------------|---------------------------|-----------------|------------------------------------------------|
| GET         | `/`           | N/A                       | N/A             | Returns the homepage view.                     |
| GET         | `/bycategory` | `CategoryController`      | `ByCategory`    | Retrieves products by category.                |
| GET         | `/by-brand`   | `BrandController`         | `ByBrand`       | Retrieves products by brand.                   |
| GET         | `/policy`     | `PolicyController`        | `PolicybyType`  | Displays policy based on type.                 |
| GET         | `/details`    | `ProductController`       | `details`       | Displays product details.                      |
| GET         | `/login`      | `UserController`          | `LoginPage`     | Displays the login page.                       |
| GET         | `/verify`     | `UserController`          | `VerifyPage`    | Displays the OTP verification page.            |

### API Routes

#### Brand API Routes

| HTTP Method | URI                 | Controller           | Method          | Description                                    |
|-------------|---------------------|----------------------|-----------------|------------------------------------------------|
| GET         | `/brand-list`       | `BrandController`    | `getall`        | Retrieves the list of all brands.              |

#### Category API Routes

| HTTP Method | URI                 | Controller             | Method          | Description                                    |
|-------------|---------------------|------------------------|-----------------|------------------------------------------------|
| GET         | `/category-list`    | `CategoryController`    | `getall`        | Retrieves the list of all categories.          |

#### Product API Routes

| HTTP Method | URI                             | Controller            | Method               | Description                                     |
|-------------|---------------------------------|-----------------------|----------------------|-------------------------------------------------|
| GET         | `/list-product-category/{id}`   | `ProductController`    | `ListProductbyCategory` | Lists products by category ID.               |
| GET         | `/list-product-brand/{brand_id}`| `ProductController`    | `ListProductbyBrand`   | Lists products by brand ID.                   |
| GET         | `/list-product-remark/{remark}` | `ProductController`    | `ListProductbyRemark`  | Lists products by remark.                     |
| GET         | `/list-product-slider`          | `ProductController`    | `ListProductbySlider`  | Lists products for the homepage slider.       |
| GET         | `/product-details/{id}`         | `ProductController`    | `ProductDetailsbyId`   | Retrieves product details by product ID.      |
| GET         | `/list-review/{product_id}`     | `ProductController`    | `ListReviewProduct`    | Lists reviews for a specific product.         |

#### Policy API Route

| HTTP Method | URI                 | Controller            | Method          | Description                                    |
|-------------|---------------------|-----------------------|-----------------|------------------------------------------------|
| GET         | `/policy-type/{type}`| `PolicyController`    | `policy`        | Retrieves policies based on the type.          |

### User API Routes

| HTTP Method | URI                        | Controller           | Method          | Description                                     |
|-------------|----------------------------|----------------------|-----------------|-------------------------------------------------|
| GET         | `/UserLogin/{UserEmail}`    | `UserController`     | `UserLogin`     | Logs in a user by email.                        |
| GET         | `/VerifyLogin/{UserMail}/{OTP}`| `UserController`   | `VerifyLogin`   | Verifies user login by email and OTP.           |
| GET         | `/UserLogout`              | `UserController`     | `UserLogout`    | Logs out the user.                              |

### Protected Routes (Token Verification Required)

#### User Profile API Routes

| HTTP Method | URI              | Controller          | Method          | Description                                    |
|-------------|------------------|---------------------|-----------------|------------------------------------------------|
| POST        | `/CreateUser`     | `ProfileController` | `CreateUser`    | Creates a new user profile.                    |
| GET         | `/ReadProfile`    | `ProfileController` | `ReadProfile`   | Retrieves the profile of the logged-in user.   |

#### User Review API Routes

| HTTP Method | URI              | Controller               | Method          | Description                                    |
|-------------|------------------|--------------------------|-----------------|------------------------------------------------|
| POST        | `/CreateReview`   | `ProductReviewController`| `CreateReview`  | Creates a new product review.                  |
| POST        | `/ReadReview`     | `ProductReviewController`| `ReadReview`    | Retrieves reviews of a product.                |

#### Wishlist API Routes

| HTTP Method | URI                           | Controller          | Method          | Description                                    |
|-------------|-------------------------------|---------------------|-----------------|------------------------------------------------|
| POST        | `/ProductWishList`            | `ProductController` | `ProductWishList` | Retrieves the user's wishlist.              |
| POST        | `/CreateWishList/{product_id}`| `ProductController` | `CreateWishList`| Adds a product to the user's wishlist.         |
| POST        | `/RemoveWishList/{product_id}`| `ProductController` | `RemoveWishList`| Removes a product from the user's wishlist.    |

#### Cart API Routes

| HTTP Method | URI                           | Controller          | Method          | Description                                    |
|-------------|-------------------------------|---------------------|-----------------|------------------------------------------------|
| POST        | `/CreateCartList`             | `ProductController` | `CreateCartList`| Adds a product to the cart.                    |
| GET         | `/CartList`                   | `ProductController` | `CartList`      | Retrieves the list of items in the cart.       |
| GET         | `/DeleteCartList/{product_id}`| `ProductController` | `DeleteCartList`| Removes a product from the cart.               |

#### Invoice API Routes

| HTTP Method | URI                           | Controller          | Method          | Description                                    |
|-------------|-------------------------------|---------------------|-----------------|------------------------------------------------|
| POST        | `/CreateInvoice`              | `InvoiceController` | `CreateInvoice` | Creates a new invoice.                         |
| GET         | `/InvoiceList`                | `InvoiceController` | `InvoiceList`   | Retrieves a list of invoices.                  |
| GET         | `/InvoiceProductList/{invoice_id}`| `InvoiceController` | `InvoiceProductList` | Retrieves products under a specific invoice. |

### Payment API Routes

| HTTP Method | URI              | Controller          | Method           | Description                                    |
|-------------|------------------|---------------------|------------------|------------------------------------------------|
| POST        | `/PaymentSuccess`| `InvoiceController` | `PaymentSuccess` | Handles payment success event.                 |
| POST        | `/PaymentCancel` | `InvoiceController` | `PaymentCancel`  | Handles payment cancellation event.            |
| POST        | `/PaymentFail`   | `InvoiceController` | `PaymentFail`    | Handles payment failure event.                 |

## Development Process

### Sprint 1: User Authentication
- Implemented user registration and login functionality.
- Added JWT-based API authentication using Laravel Sanctum.

### Sprint 2: Product Category Management
- Developed CRUD operations for product categories and products.
- Integrated category selection for products.

### Sprint 3: Product Management
- Developed CRUD operations for products.
- Integrated Products category selection for products.

### Sprint 4: Customer Management
- Created customer profiles with CRUD functionality.

### Sprint 5: Invoice Generation
- Developed invoice creation, listing, and detailed views.

### Sprint 6: Payment Integration
- Integrated payment gateway and handled payment status updates.

## Contributing

If you would like to contribute to this project, please fork the repository and create a pull request with your changes. Ensure that all tests pass before submitting your pull request.


## Contact

For any questions or feedback, please contact *MD Abdulla Jobayer* at *mdabdullajovayer@gmail.com*.
