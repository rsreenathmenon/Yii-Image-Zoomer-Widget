<?php


/**
 * ImageZoomer Widget file.
 * @author Sandip Das <sandip.sandip.das5@gmail.com>
 * @copyright Copyright &copy; Sandip Das 2013
 * @license MIT License
*/

class ImageZoomer extends CWidget
{
	public $_options = array();
	 public function init()
 
    {
 
        $this->registerAssets();
 
    }
	
	public function run()
    {
		//$images = dirname(__FILE__).'/assets/images';
		echo '<div>ranjeet</div><div class="targetarea" style="border:1px solid #eee"><img id="multizoom1" alt="zoomable" title="" src="'.Yii::app()->getBaseUrl().'/uploads/images/millasmall.jpg"/></div>
<div id="description">Milla Jojovitch</div>';
		
		Yii::app()->clientScript->registerScript("ImageZoomer","
		$('#multizoom1').addimagezoom({ 
		/* multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'*/
		descArea: '#description', /* description selector (optional - but required if descriptions are used) - new*/
		speed: 1500, /* duration of fade in for new zoomable images (in milliseconds, optional) - new*/
		descpos: true, /* if set to true - description position follows image position at a set distance, defaults to false (optional) - new*/
		imagevertcenter: true, /* zoomable image centers vertically in its container (optional) - new*/
		magvertcenter: true, /* magnified area centers vertically in relation to the zoomable image (optional) - new*/
		zoomrange: [3, 10],
		magnifiersize: [500,500],
		magnifierpos: 'right',
		cursorshadecolor: '#fdffd5',
		largeimage: '".Yii::app()->getBaseUrl()."/uploads/images/milla.jpg',
		cursorshade: true /*<-- No comma after last option!*/
	});
	
	", CClientScript::POS_READY);
		?>
       <!-- <div class="multizoom1 thumbs">

<a href="assets/images/saleensmall.jpg" data-lens="false" data-magsize="150,150" data-large="assets/images/saleen.jpg" data-title="Saleen S7 Twin Turbo"><img src="images/saleen_tmb.jpg" alt="Saleen" title=""/></a> 
<a href="assets/images/haydensmall.jpg" data-large="assets/images/hayden.jpg" data-title="Hayden Panettiere"><img src="assets/images/hayden_tmb.jpg" alt="Hayden" title=""/></a> 
<a href="assets/images/jaguarsmall.jpg" data-large="assets/images/jaguar.jpg" data-title="Jaguar Type E"><img src="assets/images/jaguar_tmb.jpg" alt="Jaguar" title=""/></a>
</div>-->
        
        <?php
		
	}
	public function registerAssets()
	{
				$assets = dirname(__FILE__).'/assets';
                $baseUrl = Yii::app()->assetManager->publish($assets);
				$jsFile=$baseUrl."/image_zoomer.js";
				$cssFile=$baseUrl."/image_zoomer.css";
                Yii::app()->clientScript->registerScriptFile($jsFile, CClientScript::POS_END);
				
				Yii::app()->clientScript->registerCssFile($cssFile);
	}
}
?>