
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Welcome</title>
</head>
<body>
    <header class="adapt-header">
        <section class="container page-navbar">
            <div class="left-navbar">
                <a href="#" class="title">MainNews</a>
            </div>
            <div class="right-navbar">
                <div class="navbar-registration">
                    <a href="./login.php" class="registration-link">Войти</a>
                    <a href="./registr.php" class="registration-link">Регистрация</a>
                </div>
            </div>
        </section>
    </header>
    <main>
        <div class="menu">
            <div class="center-navbar">
                <a href="./news/categories_list" class="center-nav-link">категории</a>
                <a href="./" class="center-nav-link">новости</a>
                <a href="./" class="active-link center-nav-link">добавить новость</a>
            </div>
        </div>
        <H1 class="h1-category">Категории</H1>
        <?php foreach($categoriesList as $category): ?>
            <div class="category">
                <h3>
                    <a class="category-link" href="<?=route('news', ['category_name' => $category])?>">
                        <?=$category?>
                    </a>
                </h3>
        <?php endforeach; ?>
    </main>
    <footer class="footer" >
        <span class="footer-info">
            Subscribe on us!
        </span>
    </footer>
    </body>
</html>