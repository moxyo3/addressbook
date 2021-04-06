<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AddressData;
use App\Logics\AddressLogic;


class AddressController extends Controller {
    public function showAllAddress() {
        $items = AddressData::all();
        return view('address.main', ['items' => $items]);
    }

    public function createPage() {
        $is_registration = true;
        return view('address.edit', ['is_registration'=>$is_registration]);
    }

    public function addAddress(Request $request) {
        $address = new AddressData;

        $address->family_name = $request->family_name;
        $address->first_name = $request->first_name;
        $address->kana_family = $request->kana_name;
        $address->post_num = $request->post_num;
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->mail_address = $request->mail_address;
        $address->phone_num = $request->phone_num;
        $address->memo = $request->memo;
        $address->save();

        return redirect('/');
    }

    public function edit($id) {
        $is_registration = false;
        $item = AddressData::find($id);
        return view('address.edit' ,['item'=>$item, 'is_registration'=>$is_registration]);
    }

    public function update(Request $request) {
        $address = AddressData::find($request->id);

        $form = $request->all();
        unset($form["_token"]);

        $address->fill($form);
        $address->save();

        return redirect('/');
    }

    public function delete(Request $request) {
        $address = AddressData::find($request->id);

        $address->delete();
        return redirect('/');
    }

    public function search(Request $request) {
        $searchword = $request->search_word;
        if($searchword == null && "") {
        return redirect('/');
        } else {
            //検索結果表示
            $query = AddressData::query();
            $items = 
            $query->where('family_name', 'like', '%'.$searchword.'%')
                ->orWhere('first_name', 'like', '%'.$searchword.'%')
                ->orWhere('kana_family', 'like', '%'.$searchword.'%')
                ->orWhere('kana_name', 'like', '%'.$searchword.'%')
                ->orWhere('post_num', 'like', '%'.$searchword.'%')
                ->orWhere('address1', 'like', '%'.$searchword.'%')
                ->orWhere('address2', 'like', '%'.$searchword.'%')
                ->orWhere('phone_num', 'like', '%'.$searchword.'%')
                ->orWhere('mail_address', 'like', '%'.$searchword.'%')
                ->orWhere('memo', 'like', '%'.$searchword.'%')
                ->get();

            return view('address.search', ['items' => $items]);
        }
    }
}