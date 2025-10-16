<?php 
namespace App\Views;

use App\Views\BaseTemplate;

class HistoryTemplate extends BaseTemplate {
    public static function getHistoryTemplate(array $orders = []): string {
        $template = parent::getTemplate();
        $title = "История заказов";
        $content = "<main class='container mt-5'>";

        if (empty($orders)) {
            $content .= "<div class='row'><div class='col-12 text-center'>Нет заказов</div></div>";
        } else {
            $content .= "<div class='row'><div class='col-12'><h3>Ваши заказы</h3></div></div>";

            $currentOrderId = null;
            foreach ($orders as $order) {
                if ($currentOrderId !== $order['id']) {
                    if ($currentOrderId !== null) {
                        $content .= "</ul></div></div>";
                    }
                    $status = $order['status'] ?? 'в обработке';

                    $content .= <<<END
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Заказ #{$order['id']}</h5>
                                    <p class="card-text">
                                        <strong>ФИО:</strong> {$order['fio']}<br>
                                        <strong>Адрес:</strong> {$order['address']}<br>
                                        <strong>Телефон:</strong> {$order['phone']}<br>
                                        <strong>Email:</strong> {$order['email']}<br>
                                        <strong>Сумма:</strong> {$order['all_sum']} ₽<br>
                                        <strong>Дата:</strong> {$order['created_at']}<br>
                                        <strong>Статус:</strong> {$status}<br>
                                        <strong>Товары:</strong>
                                    </p>
                                    <ul class="list-group mt-2">
                    END;

                    $currentOrderId = $order['id'];
                }
                $content .= "<li class='list-group-item'>" . $order['name'] . " — " . $order['size'] . "</li>";
            }

            if ($currentOrderId !== null) {
                $content .= "</ul></div></div></div>";
            }
        }
        $content .= "</main>";

        return sprintf($template, $title, $content);
    }
}