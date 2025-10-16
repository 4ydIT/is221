<?php 
namespace App\Views;

use App\Views\BaseTemplate;
use App\Configs\Config;

class HomeTemplate extends BaseTemplate {
    public static function getTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Lumielan — Ваш стильный гардероб';
        $content = <<<CORUSEL
        <section class="text-center my-5">
            <!-- Одна большая картинка -->
            <div class="container">
                <img src="https://localhost/lumielan/assets/images/hero-main.png" 
                     class="img-fluid rounded shadow-sm" 
                     alt="Главная картинка" 
                     style="max-height: 60vh; object-fit: cover;">
            </div>
        </section>

        <main class="row p-5">
            <div class="col-12 text-center">
                <h1>Добро пожаловать в Lumielan</h1>
                <p class="lead mt-3">Только эксклюзивная женская одежда и аксессуары по доступным ценам.</p>
                <a href="https://localhost/lumielan/products" class="btn btn-primary btn-lg mt-4">Перейти в каталог</a>
            </div>
        </main>
        CORUSEL;

        return sprintf($template, $title, $content);
    }
}