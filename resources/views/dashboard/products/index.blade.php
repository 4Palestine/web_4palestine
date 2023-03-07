@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'permission_key' => 'product',
            'table_title' => 'products',
            {{-- 'table_button_text' => 'Create product', --}}
            'table_button_route' => 'dashboard.products.create']"

        :ths="['#', 'image', 'name', 'store', 'category', 'price', 'Description', 'Is Featured', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillable_images="['image']"
        :fillables="['name', 'store_name', 'category_name', 'price', 'description']" {{-- parent_id => parent_name --}}
        {{-- :fillable_relation_name="[
            'store' =>
        ]" --}}
        :fillable_badges="[
            'featured' => ['0' => ['Not Featured', 'alert-danger'], '1' => ['Featured', 'alert-success']],
            'status' => ['active' => ['Active', 'alert-success'], 'archived' => ['Archived', 'alert-danger'], 'draft' => ['Draft', 'alert-warning']]
        ]"



        :actions="[
            // 'show_modal' => true,
            'route_show' => 'dashboard.products.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.products.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.products.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.products.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.products.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.products.exportPdf']"
        :import_excel="['route_name'=>'dashboard.products.importExcel']"

        :text_filters="[
            ['name' => 'name_description',           'label' => 'filter by name, or description',         'cols' => '4'],
        ]"

        :select_fixed_filters="[
            [
                'name' => 'status',
                'label' => 'Activity filter',
                'cols' => '3',
                'options' => [
                    [
                        'option_value' => 'active',
                        'option_label' => 'Active',
                    ],
                    [
                        'option_value' => 'draft',
                        'option_label' => 'Draft',
                    ],
                    [
                        'option_value' => 'archived',
                        'option_label' => 'Archived',
                    ],
                ]
            ],
            [
                'name' => 'featured',
                'label' => 'Is Featured',
                'cols' => '3',
                'options' => [
                    [
                        'option_value' => '0',
                        'option_label' => 'Not Featured',
                    ],
                    [
                        'option_value' => '1',
                        'option_label' => 'Featured',
                    ],
                ]
            ],
        ]"
    />
@endsection
