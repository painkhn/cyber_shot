<?php
namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ReportExport implements FromCollection, WithHeadings, WithStyles
{
    /*
    * Формирование отчета
    */
    public function collection()
    {
        $data = [];

        $paymentMethodTranslations = [
            'card' => 'карта',
            'cash' => 'наличные',
        ];

        $statusTranslations = [
            'waiting' => 'ожидает',
            'confirmed' => 'подтвержден',
            'rejected' => 'отменен',
        ];

        $data[] = ['Статус заказов', '', ''];

        $statusCounts = Order::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->pluck('total', 'status')
            ->toArray();

        $data[] = ['Ожидают', $statusCounts['waiting'] ?? 0, ''];
        $data[] = ['Подтверждены', $statusCounts['confirmed'] ?? 0, ''];
        $data[] = ['Отменены', $statusCounts['rejected'] ?? 0, ''];

        $data[] = ['', '', ''];
        $data[] = ['Количество заказов', '', ''];

        $currentMonthOrders = Order::where('created_at', '>=', Carbon::now()->subMonth())->count();
        $halfYearOrders = Order::where('created_at', '>=', Carbon::now()->subMonths(6))->count();
        $allTimeOrders = Order::count();

        $data[] = ['За месяц', $currentMonthOrders, ''];
        $data[] = ['За пол года', $halfYearOrders, ''];
        $data[] = ['За все время', $allTimeOrders, ''];

        $data[] = ['', '', '', '', ''];
        $data[] = ['ID', 'Email пользователя', 'Название товара', 'Способ оплаты', 'Статус', 'Создан'];

        $orders = Order::with('user', 'product')->get();
        foreach ($orders as $order) {
            $data[] = [
                $order->id,
                $order->user->email,
                $order->product->name,
                $paymentMethodTranslations[$order->payment_method],
                $statusTranslations[$order->status],
                $order->created_at,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [];
    }

    /*
    * Добавление стиоей
    */
    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:C1');
        $sheet->mergeCells('A6:C6');
        $sheet->mergeCells('A15:C15');
        $sheet->mergeCells('A19:C19');

        $sheet->getStyle('A1:C1')->getFont()->setBold(true);
        $sheet->getStyle('A6:C6')->getFont()->setBold(true);
        $sheet->getStyle('A11:F11')->getFont()->setBold(true);
        $sheet->getStyle('A15:C15')->getFont()->setBold(true);
        $sheet->getStyle('A19:C19')->getFont()->setBold(true);

        $sheet->getStyle('A1:F' . (count($this->collection()) + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:F' . (count($this->collection()) + 1))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
    }
}
