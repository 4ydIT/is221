<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class UserTemplate extends BaseTemplate {
    public static function getUserTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Вход в аккаунт';
        $content = <<<FORM
        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Вход</h3>
                        </div>
                        <div class="card-body">
                            <form action="/lumielan/login" method="POST">
                                <div class="mb-3">
                                    <label>Логин или email:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Пароль:</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Войти</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <p class="mb-0">Нет аккаунта? <a href="/lumielan/register">Зарегистрируйтесь</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        FORM;
        return sprintf($template, $title, $content);
    }
}