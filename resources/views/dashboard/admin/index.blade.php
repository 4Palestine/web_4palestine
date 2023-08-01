@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'permission_key' => 'admin',
            'table_title' => 'Admins',
            'table_button_route' => 'dashboard.admin.create']"

        :ths="['#', 'Name', 'Email', 'Role' , 'Is Active',
            'Actions']"

        :model="$admins"
        :models="$admins"
        :fillables="['name', 'email' , 'role']"
        :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']] ,
        ]"
        {{-- :fillable_badges_array="['roles_name']" --}}
        :actions="[
            'route_show' => 'dashboard.admin.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.admin.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.admin.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.admin.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.admin.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.admin.exportPdf']"
        :import_excel="['route_name'=>'dashboard.admin.importExcel']"

        :text_filters="[
            ['name' => 'name',           'label' => 'filter by Name',         'cols' => '4'],
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
