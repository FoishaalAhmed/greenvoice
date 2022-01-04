<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'value',
    ];

    public function storeGeneral(Object $request)
    {
        $this->name   = $request->name;
        $this->value  = $request->value;
        $storeGeneral = $this->save();

        $storeGeneral
            ? session()->flash('success', 'General Created Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateGeneral(Object $request, Int $id)
    {
        $general        = $this::findOrFail($id);
        $general->name  = $request->name;
        $general->value = $request->value;
        $updateGeneral  = $general->save();

        $updateGeneral
            ? session()->flash('success', 'General Updated Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyGeneral(Int $id)
    {
        $general = $this::findOrFail($id);
        $destroyGeneral = $general->delete();

        $destroyGeneral
            ? session()->flash('success', 'General Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
