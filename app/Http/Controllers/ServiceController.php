<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;
use App\MemberUseService;
use App\Service;
use App\StreetAddress;
use App\User;

use App\Repositories\ServiceRepository;
use App\Repositories\MemberUseServiceRepository;

class ServiceController extends Controller
{
    /**
     * Repository
     */
    protected $serviceRepository;
    protected $memberUseServiceRepository;

    /**
     * コンストラクタ
     */
    public function __construct(ServiceRepository $serviceRepository, MemberUseServiceRepository $memberUseServiceRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->memberUseServiceRepository = $memberUseServiceRepository;
    }

    /**
     * サービス一覧
     */
    public function index()
    {
        $services = $this->serviceRepository->getService();
        return view('services.index', [
            'services'  => $services
        ]);
    }

    /**
     * サービス追加
     */
    public function add(Request $request)
    {
        // validate
        $this->validate($request, [
            'service_name' => 'required'
        ]);
        // 登録
        $this->serviceRepository->saveService($request);
        return redirect('service');
    }

    /**
     * サービス編集
     */
    public function edit(Request $request)
    {
        // validate
        $this->validate($request, [
            'service_name' => 'required'
        ]);
        // 登録
        $this->serviceRepository->updateService($request);
        return redirect('service');
    }

    public function detail($id)
    {
        $service = $this->serviceRepository->getServiceDetail($id);
        $members = $this->memberUseServiceRepository->getServiceUseMember($id);
        return view('services.detail', [
            'service'   => $service,
            'members'   => $members,
        ]);
    }

    public function delete(Service $service, $id)
    {
        $service->where('id', $id)->delete();
        return redirect('service');
    }

}
