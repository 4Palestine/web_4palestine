@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'Trashed Missions',
            {{-- 'table_button_text' => 'Create mission', --}}
            'table_button_route' => 'dashboard.mission.create'
        ]"

        :ths="['#', 'Image', 'Platform', 'Link', 'Description', 'Duration', 'Stars', 'Deleted At', 'Type', 'Status', 'Actions']"

        :model="$model"
        :models="$models"
        :fillable_images="['image']"
        :fillables="['platform_name', 'mission_link', 'description', 'mission_duration', 'mission_stars', 'deleted_at']"
        :fillable_badges="[
            'mission_type' => ['support' => ['Support', 'alert-success'], 'attack' => ['Attack', 'alert-danger']],
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']]
        ]"


        :actions="[
            'route_restore' => 'dashboard.mission.restore',
            'icon_class_restore' => 'bx bx-history font-20',

            'route_force_delete' => 'dashboard.mission.forceDelete',
            'icon_class_force_delete' => 'bi bi-trash-fill text-danger',
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

{{-- @push('script')
<script>
    $(function(e){
        $("#deletegroup").click(function(){
            $('.chechfordelete').prop('checked',$(this).prop('checked'));
        });
    })
</script>
@endpush --}}
