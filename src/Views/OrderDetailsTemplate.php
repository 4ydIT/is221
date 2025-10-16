<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class OrderDetailsTemplate extends BaseTemplate {
    public static function getOrderDetailsTemplate(array $order, array $items): string {
        $template = parent::getTemplate();
        $title = "Детали заказа #{$order['id']}";
        $content = "<main class='container mt-5'>";
        $content .= "<h3>Заказ #{$order['id']}</h3>";
        $content .= "<p><strong>ФИО:</strong> {$order['fio']}</p>";
        $content .= "<p><strong>Адрес:</strong> {$order['address']}</p>";
        $content .= "<p><strong>Телефон:</strong> {$order['phone']}</p>";
        $content .= "<p><strong>Email:</strong> {$order['email']}</p>";
        $content .= "<p><strong>Сумма:</strong> {$order['all_sum']} ₽</p>";
        $content .= "<p><strong>Дата:</strong> {$order['created_at']}</p>";
        $content .= "<p><strong>Статус:</strong> {$order['status'] ?: 'в обработке'}</p>";

        $content .= "<h4>Товары в заказе:</h4>";
        $content .= "<table class='table'>";
        $content .= "<tr><th>Товар</th><th>Количество</th><th>Размер</th><th>Сумма</th></tr>";

        foreach ($items as $item) {
            $content .= "<tr>";
            $content .= "<td>{$item['name']}</td>";
            $content .= "<td>{$item['count_item']}</td>";
            $content .= "<td>{$item['size']}</td>"; // ✅ Отображение размера
            $content .= "<td>{$item['sum_item']} ₽</td>";
            $content .= "</tr>";
        }

        $content .= "</table>";
        $content .= "<a href='/lumielan/orders' class='btn btn-secondary'>Назад</a>";
        $content .= "</main>";

        return sprintf($template, $title, $content);
    }
}