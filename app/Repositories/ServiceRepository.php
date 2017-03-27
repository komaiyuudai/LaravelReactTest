<?php
namespace App\Repositories;

use App\Service;
    
class ServiceRepository
{
    /**
     * サービス取得
     */
    public function getService()
    {
        return Service::where('deleted', 0)
                        ->orderBy('id', 'asc')
                        ->get();
    }

    /**
     * 会員登録
     */
    public function saveService($request)
    {
        $service = new Service;
        $service->service_name = $request->service_name;
        $service->save();
        return;
    }

    /**
     * 会員編集
     */
    public function updateService($request)
    {
        Service::where('id', $request->id)
                ->update([
                    'service_name'  => $request->service_name
                ]);
        return;
    }

    /**
     * 会員削除
     */
    public function deleteService($id)
    {
    	Member::where('id', $id)->delete();
    	return;
    }


    public function getServiceDetail($id)
    {
        return Service::where('id', '=', $id)->first();
    }






}