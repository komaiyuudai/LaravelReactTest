<?php
namespace App\Repositories;

use App\MemberUseService;
    
class MemberUseServiceRepository
{
    /**
     * サービス利用中の会員取得
     */
    public function getServiceUseMember($id)
    {
        return MemberUseService::leftJoin('members', 'member_use_services.member_id', '=', 'members.id')
            ->where('member_use_services.service_id', '=', $id)
            ->where('members.deleted', '!=', '1')
            ->where('member_use_services.deleted', '!=', '1')
            ->get();
    }

    /**
     * 会員のサービス情報登録
     */
    public function saveMemberUseService($request)
    {
        $memberUseService = new MemberUseService;
        $memberUseService->member_id = $request->member_id;
        $memberUseService->service_id = $request->service_id;
        $memberUseService->deleted = $request->deleted;
        $memberUseService->save();
        return;

    }
}