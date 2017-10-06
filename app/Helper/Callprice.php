<?php

if (! function_exists('Callprice')) {
	function Callprice()
	{
		$price	=	\App\Price::limit(1)->get();

		foreach ($price as $price) {
			if ($price->price >0) {
				return $price->price;
			}else{
				return null;
			}
		}
	}
}