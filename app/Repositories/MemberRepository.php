<?php
namespace App\Repositories;

use App\Member;
    
class MemberRepository
{
	/**
	 * 会員取得
	 */
    public function getMember()
    {
    	return Member::where('deleted', 0)
    					->orderBy('id', 'asc')
    					->get();
    }

    /**
     * 会員登録
     */
    public function saveMember($request)
    {
        $member = new Member;
        $member->name = $request->name;
        $member->sex = $request->sex;
        $member->age = $request->age;
        $member->street_address_id = $request->street_address_id;
        $member->mail_address = $request->mail_address;
        $member->tel = $request->tel;
        $member->login_account = $request->login_account;
        $member->login_password = $request->login_password;
        $member->deleted = $request->deleted;
        $member->save();
        return;
    }

    /**
     * 会員編集
     */
    public function updateMember($request)
    {
        Member::where('id', $request->id)
        		->update([
		            'name' => $request->name,
        		    'sex' => $request->sex,
		            'age' => $request->age,
        		    'street_address_id' => $request->street_address_id,
		            'mail_address' => $request->mail_address,
        		    'tel' => $request->tel,
		            'login_account' => $request->login_account,
        		    'login_password' => $request->login_password,
		        ]);
		return;
    }

    /**
     * 会員削除
     */
    public function deleteMember($id)
    {
    	Member::where('id', $id)->delete();
    	return;
    }


}