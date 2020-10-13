<?php

namespace App\Http\Controllers;

use App\CFieldType;
use App\Field;
use App\FieldBlock;
use App\Module;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ModuleController extends Controller
{
    public function getDetailViewBlocksWithFields($moduleName){

        //return Module::where('name', 'clients')->first()->fieldBlock()->with('field')->get();
        return Module::where('name', 'clients')
            ->with([
                'fieldBlocks' => function($query) {
                    return $query->select([
                        'id',
                        'module_id',
                        'name',
                        'label',
                        'sequence'
                    ]);
                },
                'fieldBlocks.fields' => function($query){
                    return $query->select ([
                        'id',
                        'module_id',
                        'field_type_id',
                        'field_block_id',
                        'name',
                        'label',
                        'sequence'
                    ]);
                },
                'fieldBlocks.fields.fieldType' => function($query){
                    return $query->select ([
                            'id',
                            'name'
                        ]);
                }
            ])->get()->first();
    }


    public function getFormData()
    {
        $types = CFieldType::all(['name AS text', 'id AS value']);

        $blocks = FieldBlock::all(['label AS text', 'id AS value']);

        $modules = Module::all(['name AS text', 'id AS value']);

        return [ 'type' => $types, 'block' => $blocks, 'module' => $modules];
    }

    public function newField(){
        $result = request()->validate([
            'block' => 'required',
            'module' => 'required',
            'label' => 'required',
        ]);

        return Field::create([
            'label' => \request('label'),
            'name' => \request('label'),
            'module_id' => \request('module'),
            'field_block_id' => \request('block'),
            'field_type_id' => request('field_type_id')
        ]);
    }

}

