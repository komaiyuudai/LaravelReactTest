<?php
namespace App\Repositories;

use App\StreetAddress;
    
class StreetAddressRepository
{
	/**
	 * 住所取得
	 */
    public function getStreetAddress()
    {
    	return StreetAddress::where('deleted', 0)
    					->orderBy('id', 'asc')
    					->get();
    }
}