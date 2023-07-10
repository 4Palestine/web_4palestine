@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'permission_key' => 'mission',
            'table_title' => 'Missions',
            'table_button_route' => 'dashboard.mission.create']"

        :ths="['#', 'Image', 'Platform', 'Link', 'Description', 'Duration', 'Stars', 'Type', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillable_images="['image']"
        :fillables="['platform_name', 'mission_link', 'description', 'mission_duration', 'mission_stars']"
        :fillable_badges="[
            'mission_type' => ['support' => ['Support', 'alert-success'], 'attack' => ['Attack', 'alert-danger']],
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']]
        ]"

        :actions="[
            // 'show_modal' => true,
            'route_show' => 'dashboard.mission.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.mission.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.mission.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.mission.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.mission.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.mission.exportPdf']"
        :import_excel="['route_name'=>'dashboard.mission.importExcel']"

        :text_filters="[
            ['name' => 'description',           'label' => 'filter by description',         'cols' => '4'],
        ]"


        :select_fixed_filters="[
            [
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
            ],
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
