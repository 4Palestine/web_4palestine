@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'Trashed Products',
            {{-- 'table_button_text' => 'Create product', --}}
            'table_button_route' => 'dashboard.products.create'
        ]"

        :ths="['#', 'image', 'name', 'store', 'category', 'price', 'Description', 'Deleted At', 'Is Featured', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillable_images="['image']"
        :fillables="['name', 'store_id', 'category_id', 'price', 'description', 'deleted_at']" {{-- parent_id => parent_name --}}
        :fillable_badges="[
            'featured' => ['0' => ['Not Featured', 'alert-danger'], '1' => ['Featured', 'alert-success']],
            'status' => ['active' => ['Active', 'alert-success'], 'archived' => ['Archived', 'alert-danger'], 'draft' => ['Draft', 'alert-warning']]
        ]"
        :actions="[
            'route_restore' => 'dashboard.products.restore',
            'icon_class_restore' => 'bx bx-history font-20',

            'route_force_delete' => 'dashboard.products.forceDelete',
            'icon_class_force_delete' => 'bi bi-trash-fill text-danger',

            // 'with_delete_group' => true,
        ]"
        {{-- :export_excel="['route_name'=>'dashboard.products.exportExcel']" --}}
        {{-- :export_excel_demo="['route_name'=>'dashboard.products.exportExcelDemo']" --}}
        {{-- :export_pdf="['route_name'=>'dashboard.products.exportPdf']" --}}
        {{-- :import_excel="['route_name'=>'dashboard.products.importExcel']" --}}

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
            ]
        ]"

    />
@endsection

{{-- @push('script')
<script>
    $(function(e){
        $("#deletegroup").click(function(){
            $('.chechfordelete').prop('checked',$(this).prop('checked'));
        });
    })
</script>
@endpush --}}
