<?php

namespace App\Imports;

use App\Http\Controllers\Base5Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BaseImport implements ToCollection, WithHeadingRow
{
    public function __construct(public $importChildObject, public $model, public $rules)
    {
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), $this->rules)->validate();

        $new = new $this->importChildObject;
        foreach ($rows as $row) {
            $this->model::create($new->importCollection($row));
            // $this->model::create([
            //     'name' => $row['name'],
            //     'description' => $row['description'],
            //     'parent_id' => $row['parent_id'],
            //     'slug' => Str::slug($row['name']),
            //     'status' => $row['status'],
            // ]);
        }
    }
    // public function model(array $row)
    // {
    //     return new Category([
    //         'name' => $row['name'],
    //         'description' => $row['description'],
    //         'parent_id' => $row['parent_id'],
    //         'slug' => Str::slug($row['name']),
    //         'status' => $row['status'],
    //     ]);
    // }
}



// {
//     public function __construct(public $model, public $rules)
//     {
//     }
//     /**
//      * @param array $row
//      *
//      * @return \Illuminate\Database\Eloquent\Model|null
//      */
//     public function collection(Collection $rows)
//     {
//         Validator::make($rows->toArray(), $this->rules)->validate();
//        $data = $this->getAttributesForSheets($rows);
//        $this->model::insert($data );
//        dd('dsa');
//     }

//     public function getAttributesForSheets($collection)
//     {
//         $attributes = (new $this->model)->getColumnsForSheets();
//        return $collection->map(function($value) use($attributes){
//            return $value->only($attributes);
//         })->toArray();
//     }

// }

