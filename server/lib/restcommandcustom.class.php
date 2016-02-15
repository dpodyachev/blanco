<?php

class RESTCommandCustom extends RESTCommand
{
    public function update(RESTRequest $request)
    {

        $data = $request->getData();

        if (empty($data)){
            throw new RESTCommandException('HTTP POST data is empty');
        }

        $allowed_to_update_fields = array_fill_keys(array('login', 'stb_mac'), true);

        $account = array_intersect_key($data, $allowed_to_update_fields);

        if (empty($account)){
            throw new RESTCommandException('Insert data is empty');
        }

        if (!empty($account['stb_mac'])){
            $mac = Middleware::normalizeMac($account['stb_mac']);

            if (!$mac){
                throw new RESTCommandException('Not valid mac address');
            }

            $account['stb_mac'] = $mac;
        }

        if (empty($account['login'])){
            throw new RESTCommandException('Login required');
        }

        $user = User::getByLogin($account['login']);

        if (empty($user)){
            throw new RESTCommandException('Not valid login');
        }

        if (!empty($account['stb_mac'])){
            $user = User::getByMac($account['stb_mac']);

            if (!empty($user)){
                throw new RESTCommandException('MAC address already in use');
            }
        }

        return (boolean) Mysql::getInstance()->update('users', array('mac' => $account['stb_mac']), array('login' => $account['login']));
    }

    
}