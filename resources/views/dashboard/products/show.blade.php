@extends('layouts.master')

@section('master')

<x-BaseComponents.widgets.list_data :model="$model" title="Product" :buttons="[
    [
        'route' => 'dashboard.products.index',
        'label' => 'Products',
        'class' => 'bg-dark text-white'
    ],
]"

:lists="[
    [
        'label' => 'Name',
        'attribute' => 'name'
    ],
    [
        'label' => 'Description',
        'attribute' => 'description'
    ],
    [
        'type' => 'image',
        'label' => 'Image',
        'attribute' => 'image',
    ],
    [
        'type' => 'link',
        'label' => 'Category',
        'attribute' => 'category_name',
        'route' => 'dashboard.categories.show'
    ],
]"
/>
@endsection
