<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function messages(){
        return [
            "name_required"=>"O nome do produto éobrigatorio",
            "url.required"=>"A imagem é obrigatoria",
            "url.image"=>"A ficheiro deve ser uma imagem",
            "url.mimes"=>"A imagem só pode ser dos seguintes tipos: jpeg, jpg, png,gif",
            "url.max"=>"O tamanho da image é demasiado grande"
        ];
    }

}
