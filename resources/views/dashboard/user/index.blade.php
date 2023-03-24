@extends('Layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'permission_key' => 'user',
            'table_title' => 'Users',
            'table_button_route' => 'dashboard.user.create']"

        :ths="['#', 'Name', 'Email', 'Is Active' , 'Is Super',
            'Actions']"

        :model="$users"
        :models="$users"
        :fillables="['name', 'email']"
        :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']] ,
            'is_super' => [1 => ['Super', 'alert-primary'], 0 => ['Not Super', 'alert-secondary']]
        ]"
        {{-- :fillable_badges_array="['roles_name']" --}}
        :actions="[
            'route_show' => 'dashboard.user.show',
            'icon_class_show' => 'bi bi-eye-fill text-primary',

            'route_edit' => 'dashboard.user.edit',
            'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.user.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.user.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.user.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.user.exportPdf']"
        :import_excel="['route_name'=>'dashboard.user.importExcel']"

        :text_filters="[
            ['name' => 'name_email',           'label' => 'filter by name or email',         'cols' => '4'],
        ]"

    />
@endsection
