@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'Trashed Platforms',
            {{-- 'table_button_text' => 'Create platform', --}}
            'table_button_route' => 'dashboard.platform.create'
        ]"


        :ths="['#', 'image', 'name', 'Description', 'Deleted At', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillable_images="['image']"
        :fillables="['name', 'description', 'deleted_at']"
        :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']]
        ]"

        :actions="[
            'route_restore' => 'dashboard.platform.restore',
            'icon_class_restore' => 'bx bx-history font-20',

            'route_force_delete' => 'dashboard.platform.forceDelete',
            'icon_class_force_delete' => 'bi bi-trash-fill text-danger',
        ]"

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

{{-- @push('script')
<script>
    $(function(e){
        $("#deletegroup").click(function(){
            $('.chechfordelete').prop('checked',$(this).prop('checked'));
        });
    })
</script>
@endpush --}}
