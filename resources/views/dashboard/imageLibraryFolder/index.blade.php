@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'Images Library Folder',
            'table_button_route' => 'dashboard.imageLibraryFolder.create']"

        :ths="['#', 'Parent ID', 'Parent Folder', 'Name', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillables="['parent_id', 'parent_name', 'name']"
        :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']],
        ]"

        :actions="[
            'route_show' => 'dashboard.imageLibraryFolder.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.imageLibraryFolder.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.imageLibraryFolder.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
        ]"
        :export_excel="['route_name'=>'dashboard.imageLibraryFolder.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.imageLibraryFolder.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.imageLibraryFolder.exportPdf']"
        :import_excel="['route_name'=>'dashboard.imageLibraryFolder.importExcel']"


        :text_filters="[
            ['name' => 'name',           'label' => 'filter by name',         'cols' => '4'],
        ]"

        :select_fixed_filters="[

            [
                'name' => 'is_active',
                'label' => 'Activity filter',
                'cols' => '3',
                'options' => [
                    [
                        'option_value' => '1',
                        'option_label' => 'Active',
                    ],
                    [
                        'option_value' => '0',
                        'option_label' => 'Not Active',
                    ],
                ]
            ],
        ]"
    />
@endsection
