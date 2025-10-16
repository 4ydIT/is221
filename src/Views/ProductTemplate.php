<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class ProductTemplate extends BaseTemplate {
    public static function getCardTemplate(?array $record): string {
        $template = parent::getTemplate();
        if ($record) {
            $title = "Карточка товара: {$record['name']}";
            $content = <<<CORUSEL
            <main class="container mt-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <img src="{$record['image']}" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-6">
                        <h2>{$record['name']}</h2>
                        <p>{$record['description']}</p>
                        <h5>{$record['price']} ₽</h5>
                        <form action="/lumielan/basket" method="POST">
                            <input type="hidden" name="id" value="{$record['id']}">
                            <!-- ✅ Выбор размера -->
                            <select name="size" class="form-select mb-2">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M" selected>M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </main>        
            CORUSEL;
        } else {
            $title = "Товар не найден";
            $content = <<<CORUSEL
            <main class="container mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Товар не найден</h1>
                        <a href="/lumielan/products" class="btn btn-primary mt-3">Вернуться в каталог</a>
                    </div>
                </div>
            </main>        
            CORUSEL;
        }

        return sprintf($template, $title, $content);
    }

    public static function getAllTemplate(array $arr): string {
        $template = parent::getTemplate();
        $title = 'Каталог товаров';
        $content = '<div class="container mt-5">';
        $content .= '<div class="row g-4">';
        
        foreach ($arr as $item) {
            $content .= <<<END
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{$item['image']}" class="card-img-top" style="max-height: 350px; object-fit: contain;" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{$item['name']}</h5>
                        <p class="card-text">{$item['description']}</p>
                        <h5 class="mt-auto">{$item['price']} ₽</h5>
                        <form action="/lumielan/basket" method="POST">
                            <input type="hidden" name="id" value="{$item['id']}">
                            <!-- ✅ Выбор размера -->
                            <select name="size" class="form-select mb-2">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M" selected>M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
            END;
        }
        $content .= "</div></div>";
        return sprintf($template, $title, $content);
    }
}