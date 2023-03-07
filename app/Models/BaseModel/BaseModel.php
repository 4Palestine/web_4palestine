<?php

namespace App\Models\BaseModel;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class BaseModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    // protected $columnsForSheets = basename(__FILE__)->getFillable() ?? [];
    protected $columnsForSheets = null;
    protected $images = [];

    
    // protected $primaryKey = 'id';
    // protected $with = ['relationMethod:attr1,attr2'];


    public function getTest(){
        return basename(__FILE__);
    }

    public function scopeSearch(Builder $query, $request)
    {
        // if ($request['name'] ?? false) {
        //     $query->where('name', 'LIKE', "%{$request['name']}%");
        // }
        // if ($request['description'] ?? false) {
        //     $query->where('description', 'LIKE', "%{$request['description']}%");
        // }
        // if ($request['status'] && $request['status'] != '') {
        //     $query->where('status', '=', $request['status']);
        // }
    }

    public function scopeActive(Builder $query)
    {
        // $query->where('status', 'active');
        // $query->where('status', 1);
        // $query->where('is_active', 1);
    }





    public function getColumnsForSheets() {
        return $this->columnsForSheets;
    }
    public function setColumnsForSheets($columns = [])
    {
        $this->columnsForSheets = $columns;
        return $this;
    }

    public function getImages() {
        return $this->images;
    }
    public function setImages($columns = [])
    {
        $this->images = $columns;
        return $this;
    }
}
