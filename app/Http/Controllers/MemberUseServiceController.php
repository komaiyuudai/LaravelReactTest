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

use App\Repositories\MemberUseServiceRepository;
use App\Repositories\MemberRepository;
use App\Repositories\ServiceRepository;

class MemberUseServiceController extends Controller
{
    /**
     * Repository
     */
    protected $memberUseServiceRepository;
    protected $memberRepository;
    protected $serviceRepository;

    /**
     * こんすとらくた
     */
    public function __construct(memberUseServiceRepository $memberUseServiceRepository, MemberRepository $memberRepository, ServiceRepository $serviceRepository)
    {
        $this->memberUseServiceRepository = $memberUseServiceRepository;
        $this->memberRepository = $memberRepository;
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * 会員利用サービスフォーム
     */
    public function index(){
        $members = $this->memberRepository->getMember();
        $services = $this->serviceRepository->getService();
        return view('member_use_service.index', [
            'members'   => $members,
            'services'  => $services,
        ]);
    }

    public function add(Request $request){
        $this->memberUseServiceRepository->saveMemberUseService($request);
        return redirect('member_use_service');
    }
}
