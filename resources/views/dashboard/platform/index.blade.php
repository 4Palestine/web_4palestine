@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'platforms',
            {{-- 'table_button_text' => 'Create platform', --}}
            'table_button_route' => 'dashboard.platform.create']"

        :ths="['#', 'image', 'name', 'Description', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillable_images="['image']"
        :fillables="['name', 'description']"
        :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']]
        ]"


        :actions="[
            // 'show_modal' => true,
            'route_show' => 'dashboard.platform.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.platform.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.platform.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.platform.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.platform.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.platform.exportPdf']"
        :import_excel="['route_name'=>'dashboard.platform.importExcel']"

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
