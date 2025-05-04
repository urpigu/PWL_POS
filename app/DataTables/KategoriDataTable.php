<?php

namespace App\DataTables;

use App\Models\KategoriModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KategoriDataTable extends DataTable
{
    /**
     * Method untuk mengolah data dan menambahkan kolom action
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($kategori) {
                return view('kategori.action', compact('kategori'));
            })
            ->rawColumns(['action'])
            ->setRowId('kategori_id')
            ->setRowAttr([
                'style' => 'background-color: white !important; cursor: default;',
                'class' => 'no-hover'
            ]);
    }

    /**
     * Method untuk meng-query data Kategori
     */
    public function query(KategoriModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Menentukan pengaturan tabel
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kategori-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters([
                'select' => [
                    'style' => 'os',
                    'selector' => 'td:not(:last-child)', // Mencegah seleksi di kolom aksi
                    'className' => '', // Menghapus class selected
                ],
                'rowCallback' => "function(row, data) {
                    $(row).removeClass('selected');
                    $(row).css('background-color', 'white');
                }",
                'drawCallback' => "function() {
                    $('#kategori-table tbody tr').removeClass('selected');
                    $('#kategori-table tbody tr').css('background-color', 'white');
                }",
                'preDrawCallback' => "function() {
                    $('#kategori-table tbody tr').removeClass('selected');
                }",
                'stripeClasses' => [], // Menghapus striping
                'hover' => false, // Menonaktifkan hover
            ])
            ->dom('Bfrtip')
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Mendefinisikan kolom yang ada di DataTable
     */
    public function getColumns(): array
    {
        return [
            Column::make('kategori_id')->title('ID'),
            Column::make('kategori_kode')->title('Kode Kategori'),
            Column::make('kategori_nama')->title('Nama Kategori'),
            Column::computed('action')
                ->title('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center')
        ];
    }

    /**
     * Mendefinisikan nama file untuk export
     */
    protected function filename(): string
    {
        return 'Kategori_' . date('YmdHis');
    }
}