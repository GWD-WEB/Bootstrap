<?php

namespace Bootstrap\View\Helper;

use Cake\View\Helper;

class BsHelper extends Helper{
	
	var $helpers = ['Html', 'Flash'];
	private $tooltip_loaded = false;
	private $glyphs_cells = [];
	private $glyphs_cells_class = '';
	
	public function loadTooltip(){
		$this->tooltip_loaded = true;
		echo "jQuery(function(){\n $('[data-toggle=\"tooltip\"]').tooltip();\n });";
	}
	
	public function tooltipNotLoaded(){
		echo "<br><div class='alert alert-warning'>".__('Você está usando Bootstrap ToolTip. Por favor, utilize a função $this->Bs->loadTooltip() dentro de tags script')."</div>";
	}
	
	public function button($text, $link, $options){
		if(isset($options['type'])){
			$html['class'] = 'btn btn-'.$options['type'];
		}
		else $html['class'] = 'btn btn-default';
		
		if(isset($options['tooltip'])){
			if(!$this->tooltip_loaded) $this->tooltipNotLoaded();
			$html['data-toggle'] = "tooltip";
			$html['data-placement'] = "top";
			$html['title'] = $options['tooltip'];
		}
		
		if(isset($options['glyphicon'])){
			$glyphicon = '<span class="glyphicon glyphicon-'.$options['glyphicon'].'"></span>';
			if($text != '') $text = $glyphicon.' '.$text;
			else $text = $glyphicon;
			$html['escape'] = false;
		}
		
		if(isset($options['class'])){
			$html['class'] .= ' '.$options['class'];
		}
		return $this->Html->link($text, $link, $html);
	}

	public function glyph($glyph, $class = ''){
		return $glyphicon = '<span class="glyphicon glyphicon-'.$glyph.' '.$class.'"></span>';
	}

	public function setGlyphCellConfigs($values, $class = ''){
		$this->glyphs_cells = $values;
		$this->glyphs_cells_class = $class;
	}
	
	public function glyphCell($value){
		$class = isset($this->glyphs_cells_class[$value]) ? $this->glyphs_cells_class[$value] : ''; 
		if(isset($this->glyphs_cells[$value]))
			return $this->glyph($this->glyphs_cells[$value], $class);
		else return '';
	}

	
}
