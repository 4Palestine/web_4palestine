@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'Tags',
            'table_button_route' => 'dashboard.tag.create']"

        :ths="['#', 'Platform', 'Name', 'Actions']"

        :model="$model"
        :models="$models"
        :fillables="['platform_name', 'name']"

        :actions="[
            'route_show' => 'dashboard.tag.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.tag.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.tag.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
        ]"
        :export_excel="['route_name'=>'dashboard.tag.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.tag.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.tag.exportPdf']"
        :import_excel="['route_name'=>'dashboard.tag.importExcel']"
    />
@endsection
