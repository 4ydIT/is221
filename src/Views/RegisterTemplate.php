<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class RegisterTemplate extends BaseTemplate {
    public static function getRegisterTemplate(): string {
        $template = parent::getTemplate();
        $title = 'Регистрация';
        $content = <<<FORM
        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Регистрация</h3>
                        </div>
                        <div class="card-body">
                            <form action="/lumielan/register" method="POST">
                                <div class="mb-3">
                                    <label>Имя пользователя:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Пароль (минимум 6 символов):</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Подтвердите пароль:</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Зарегистрироваться</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <p class="mb-0">Уже есть аккаунт? <a href="/lumielan/login">Войти</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        FORM;
        return sprintf($template, $title, $content);
    }

    public static function getVerifyTemplate(): string {
        // Удалено: больше нет подтверждения email
        return self::getRegisterTemplate();
    }
}