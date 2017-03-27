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

use App\Repositories\MemberRepository;
use App\Repositories\StreetAddressRepository;

class MemberController extends Controller
{
    /**
     * Repositoryインスタンス格納変数
     */
    protected $memberRepository;
    protected $streetAddressRepository;

    /**
     * コンストラクタ
     * Repositoryインスタンス格納
     */
    public function __construct(MemberRepository $memberRepository, StreetAddressRepository $streetAddressRepository)
    {
    	$this->memberRepository = $memberRepository;
    	$this->streetAddressRepository = $streetAddressRepository;
    }

    /**
     * メンバーリスト
     */
    public function index()
    {
    	// 会員取得
        $members = $this->memberRepository->getMember();
    	// 住所取得
        $streetAddress = $this->streetAddressRepository->getStreetAddress();
        // view指定＆アサイン
        return view('members.index',[
            'members'       => $members,
            'streetAddress' => $streetAddress
        ]);
    }

    /**
     * メンバー新規登録
     * @param   object  $request
     */
    public function add(Request $request)
    {
        // validate
        $this->validate($request, [
            'name'              => 'required',
            'sex'               => 'required',
            'age'               => 'required|numeric',
            'street_address_id' => 'required',
            'mail_address'      => 'required|email',
            'tel'               => 'required|numeric',
            'login_account'     => 'required',
            'login_password'    => 'required',
        ]);

    	// 新規会員登録
    	$this->memberRepository->saveMember($request);
        return redirect('member');
    }

    /**
     * メンバー編集
     * @param   object  $request
     * @param   object  $member
     */
    public function edit(Request $request)
    {
    	// 会員編集登録
        $this->memberRepository->updateMember($request);
        return redirect('member');
    }

    /**
     * メンバー削除
     */
    public function delete($id)
    {
    	// 削除
        $this->memberRepository->deleteMember($id);
        return redirect('member');
    }


}
