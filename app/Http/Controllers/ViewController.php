<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as AjaxRequest;
use App\Http\Controllers\Controller;
use PDF;
use Client;
use Validator;


class DirRpcController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($table_view)
    {
		$view = '';
		$c = count($table_view);
		for($i=0;$i<$c;$i++){
			if($table_view[$i]['type']=='select'){
				$view .= $this->select($table_view[$i]);
			}elseif($table_view[$i]['type']=='text'){
				$view .= $this->text($table_view[$i]);
			}elseif($table_view[$i]['type']=='table'){
				$view .= $this->table($table_view[$i]);
			}elseif($table_view[$i]['type']=='button'){
				$view .= $this->button($table_view[$i]);
			}
		}
		
    }
	
	
    public function button($view)
    {
			$view = '<div class="form-group'.$view['name'].'">';
			if(!empty($view['label'])){
			$view .= $this->label($view['label_class'],$view['label_value']);
			}
			if(!empty($view['div'])){
			$view .= '<div class="'.$view['div_class'].'">';
			}
			$view .= '<button type="button" class="'.$view['class'].'" id="'.$view['id_table'].'" name="'.$view['name'].$view['etc'].$view['value'].' </button>';
			if(!empty($view['div'])){
			$view .= '</div>'
			}
			$view .= '</div>'
		return $view;
    }
	 
    public function label($class,$value)
    {
			$label = '<label class="'.$class.'">'.$value.'</label>';
			return $label;
    }
    public function text($view)
    {
			$view = '<div class="form-group'.$view['name'].'">';
			if(!empty($view['label'])){
			$view .= $this->label($view['label_class'],$view['label_value']);
			}
			if(!empty($view['div'])){
			$view .= '<div class="'.$view['div_class'].'">';
			}
			$view .=	'<input type="text" class="'.$view['class'].'" name="'.$view['name'].'" id="'.$view['id_table'].'" 
						value="'.$view['class'].'" '.$view['etc'].'>';
			if(!empty($view['div'])){
			$view .= '</div>'
			}
			$view .= '</div>'
		return $view;
    }
	
	    public function select($view)
    {
			$view = '<div class="form-group'.$view['name'].'">';
			if(!empty($view['label'])){
			$view .= $this->label($view['label_class'],$view['label_value']);
			}
			if(!empty($view['div'])){
			$view .= '<div class="'.$view['div_class'].'">';
			}
			$view .= 	'<select class="'.$view['class'].'" name="'.$view['name'].'" id="'.$view['id'].'">
						'.$view['value'].'</select>';
			if(!empty($view['div'])){
			$view .= '</div>'
			}
			$view .= '</div>'
		return $view;
    }
	
}
