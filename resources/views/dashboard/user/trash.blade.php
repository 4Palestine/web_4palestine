@extends('layouts.master')

@section('master')
    <x-BaseComponents.tabel.base-tabel
        :tabel_data="[
            'table_title' => 'Trashed Users',
            {{-- 'table_button_text' => 'Create platform', --}}
            'table_button_route' => 'dashboard.user.create'
        ]"


        :ths="['#', 'Name', 'Email', 'Deleted At' , 'Is Active' , 'Is Super' ,
        'Actions']"

        :model="$users"
        :models="$users"
        :fillables="['name', 'email' , 'deleted_at']"
        :fillable_badges="[
            'is_active' => [1 => ['Active', 'alert-success'], 0 => ['Not Active', 'alert-danger']] ,
            'is_super' => [1 => ['Super', 'alert-primary'], 0 => ['Not Super', 'alert-secondary']]
        ]"

        :actions="[
            'route_restore' => 'dashboard.user.restore',
            'icon_class_restore' => 'bx bx-history font-20',

            'route_force_delete' => 'dashboard.user.forceDelete',
            'icon_class_force_delete' => 'bi bi-trash-fill text-danger',
        ]"

        :text_filters="[
            ['name' => 'name',           'label' => 'filter by name',         'cols' => '4'],
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
