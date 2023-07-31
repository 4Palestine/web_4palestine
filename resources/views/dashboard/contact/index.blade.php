@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'permission_key' => 'contact',
            'table_title' => 'Contacts',
            'table_button_route' => 'dashboard.contact.create'
            ]"
        :ths="['#', 'UserID', 'User Name', 'Message', 'Actions']"
        :model="$contacts"
        :models="$contacts"
        :fillables="['user_id', 'user_name', 'message']"
        {{-- :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']] ,
        ]" --}}
        {{-- :fillable_badges_array="['roles_name']" --}}
        :actions="[
            // 'route_show' => 'dashboard.admin.show',
            // 'icon_class_show' => 'bi bi-eye-fill text-primary',

            // 'route_edit' => 'dashboard.admin.edit',
            // 'icon_class_edit' => 'bi bi-pencil-fill text-warning',

            'route_destroy' => 'dashboard.contact.destroy',
            'icon_class_destroy' => 'bi bi-trash-fill text-danger',
            'with_soft_delete' => true,
        ]"
        :export_excel="['route_name'=>'dashboard.contact.exportExcel']"
        :export_excel_demo="['route_name'=>'dashboard.contact.exportExcelDemo']"
        :export_pdf="['route_name'=>'dashboard.contact.exportPdf']"
        :import_excel="['route_name'=>'dashboard.contact.importExcel']"
        />
@endsection
vb
