<?php

namespace App\DataTables;

use App\Models\Kelas;
use App\Models\Siswa;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SiswaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $model = Siswa::with('kelas');
        return datatables()
            ->eloquent($model)
            ->addColumn('kelas', function (Siswa $siswa) {
                return  $siswa->kelas->nama_kelas .' - ' . $siswa->kelas->kompetensi_keahlian;
            })
            ->addColumn('action', 'components.action-siswa');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Siswa $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Siswa $model)
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
            ->setTableId('siswa-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('csv'),
                Button::make('excel'),
                Button::make('pdf'),
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
            Column::make('nama'),
            Column::make('kelas'),
            Column::make('nisn'),
            Column::make('nis'),
            Column::make('alamat'),
            Column::make('no_telp'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Siswa_' . date('YmdHis');
    }
}
