<?php

namespace App\Transformer;

use App\Models\Scholarship;
use League\Fractal\TransformerAbstract;
// use App\Transformers\PostTransformer;


class ScholarshipTransformer extends TransformerAbstract {
  // protected $availableIncludes = [
  //   'Scholarship'
  // ];


  public function transform(Scholarship $beasiswa) {
   
      $kategori = Scholarship::find($beasiswa->id)->categories;
           return [
          'id'                  =>  $beasiswa->id,
          'nama_beasiswa'       =>  $beasiswa->nama_beasiswa,
          'nama_instantsi'      =>  $beasiswa->nama_instantsi,
          'quota'               =>  $beasiswa->quota,
          'konten'              =>  $beasiswa->konten,
          'alamat_gambar'       =>  $beasiswa->alamat_gambar,
          'masa_berlaku'        =>  $beasiswa->masa_berlaku,
          'views'               =>  $beasiswa->views,
          'prioritas'           =>  $beasiswa->prioritas,
          'facilitator_id'      =>  $beasiswa->facilitator_id,
          'created_at'          =>  $beasiswa->created_at->diffForHumans(),
          'updated_at'          =>  $beasiswa->updated_at,
          'user'                =>  $beasiswa->user,
          'facilitator'         =>  $beasiswa->facilitator,
          'categories'          =>  $kategori,
        ];
      }


}
