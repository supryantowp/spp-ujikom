<?php

namespace App\DataTables;

use App\Http\Resources\PembayaranResource;
use App\Models\Pembayaran;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembayaranDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $data = PembayaranResource::collection(Pembayaran::with('siswa')->get());
        return datatables()
            ->collection(collect($data));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pembayaran $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pembayaran $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('pembayaran-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('csv'),
                        Button::make('excel'),
                        Button::make('pdf')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('siswa'),
            Column::make('spp_bulan'),
            Column::make('jumlah_bayar'),
            Column::make('tanggal_dibayar')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pembayaran_' . date('YmdHis');
    }
}
