@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'permission_key' => 'slider',
            'table_title' => 'Slider',
            'table_button_route' => 'dashboard.slider.create']"

        :ths="['#', 'image' ,'Order' ,'Status', 'Actions']"

        :model="$sliders"
        :models="$sliders"
        :fillable_images="['mockups']"
        :fillables="['order']"
        :fillable_badges="[
            {{-- 'mission_type' => ['support' => ['Support', 'alert-success'], 'attack' => ['Attack', 'alert-danger']], --}}
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']]
        ]"

        :actions="[
            // 'show_modal' => true,
            'route_show' => 'dashboard.slider.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.slider.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.slider.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.slider.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.slider.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.slider.exportPdf']"
        :import_excel="['route_name'=>'dashboard.slider.importExcel']"
        :select_fixed_filters="[
            {{-- [
                'name' => 'mission_type',
                'label' => 'Mission Type',
                'cols' => '3',
                'options' => [
                    [
                        'option_value' => 'support',
                        'option_label' => 'Support',
                    ],
                    [
                        'option_value' => 'attack',
                        'option_label' => 'Attack',
                    ],
                ]
            ], --}}
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
