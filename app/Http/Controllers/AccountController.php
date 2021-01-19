<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use App\Immeuble;


class AccountController extends Controller
{
    /**
     * Create a new account.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAccount(Request $request)
    {
        $account = new Account();
        $account->user_id = $request->user_id;
        $account->immeuble_id = $request->immeuble_id;
        $account->content = $request->content;

        $account->save();
        return ($account);
    }

    /**
     * Get all Account.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccount()
    {
        return Account::all();
    }

    /**
     * Get Account by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccountById(Request $request, $id)
    {
        return Account::find($id);
    }

    /**
     * Get Account by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImmeubleByUserId(Request $request, $id)
    {
        $user = User::find($id);
        $accounts = Account::all();
        $newAccount = new Account();
        $allAccount = [];
        $immbeuble = new Immeuble();

        foreach ($accounts as $account) {
            if ($account->user_id === $user->id) {
                $newAccount = $account;
                break;
            }
        }
        $immbeuble = Immeuble::find($newAccount->immeuble_id);
        if (!$immbeuble) {
            return response()->json(["status" => 201, "message" => "Immeuble not found"], 201);
        }
        foreach ($accounts as $key => $account) {
            if ($account->immeuble_id === $immbeuble->id) {
                $allAccount[$key] = User::find($account->user_id);
            }
        }
        return response()->json(["status" => 200, "message" => "OK", "immeuble" => $immbeuble, "accounts" => $allAccount], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function upAccount(Request $request, $id,  Account $account)
    {
        $account = new Account();
        $account = Account::find($id);

        $account->user_id = $request->user_id;
        $account->immeuble_id = $request->immeuble_id;
        $account->content = $request->content;

        $account->save();
        return ($account);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount(Request $request, $id)
    {
        $user = User::find($id);
        $accounts = Account::all();
        $newAccount = new Account();

        foreach ($accounts as $account) {
            if ($account->user_id === $user->id) {
                $newAccount = $account;
                break;
            }
        }
        $newAccount = Account::destroy($newAccount->id);

        return ($account);
    }
}
