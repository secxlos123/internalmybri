<?php

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Storage;

if (! function_exists('name_separator')) {

    /**
     * Return an array of first name and last name from given full name.
     *
     * @param  string  $fullname
     * @return array
     */
    function name_separator($fullname)
    {
        $fullname = explode(' ', $fullname);

        return [$fullname[0], implode(' ', array_except($fullname, 0))];
    }
}

if (! function_exists('checkRolesInternal')) {

    /**
     * Generate pdf file.
     *
     * @param  string $folder
     * @param  string $filename
     * @param  string $html
     *
     * @return array
     */
    function checkRolesInternal($branch_id)
    {
        if( in_array( intval($branch_id), [ 37, 38, 39, 41, 42, 43 ] ) ) {
            $ArrRole = ['role' =>'ao','branch_id' => $branch_id ];
        } else if( in_array( intval($branch_id), [ 21, 49, 50, 51 ] ) ) {
            $ArrRole = ['role' =>'mp','branch_id' => $branch_id ];
        } else if( in_array( intval($branch_id), [ 5, 11, 12, 14, 19 ] ) ) {
            $ArrRole = ['role' =>'pinca','branch_id' => $branch_id ];
        } else if( in_array( intval($branch_id), [ 59 ] ) ) {
            $ArrRole = ['role' =>'prescreening','branch_id' => $branch_id ];
            if( in_array( strtolower($data[ 'posisi' ]), [ 'collateral appraisal', 'collateral manager' ] ) ){
                $role = str_replace(' ', '-', strtolower($data[ 'posisi' ]));
            }
        } else if( in_array( intval($branch_id), [26] ) ) {
            $ArrRole = ['role' =>'staff','branch_id' => $branch_id ];
        } else if( in_array( intval($branch_id), [18] ) ) {
            $ArrRole = ['role' =>'collateral','branch_id' => $branch_id ];
        } else {
            $ArrRole = ['role' =>'null','branch_id' => $branch_id ];
        }

        return $ArrRole;
        }
    }

if (! function_exists('getUsers')) {
    /**
     * Get logged user info.
     *
     * @param  integer $value
     * @return mixed
     */
    function getUsers()
    {
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        return $data; 
    }
}

if (! function_exists('branchs')) {
    /**
     * Get logged user info.
     *
     * @param  integer $value
     * @return mixed
     */
    function branchs()
    {
        $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
        $branchs = checkRolesInternal($data['branch']);
        return $branchs; 
    }
}


if (! function_exists('getNotification')) {
    /**
     * Get logged user info.
     *
     * @param  integer $value
     * @return mixed
     */
    function getNotification()
    {
        $users = session()->get('user');
        foreach ($users as $user) {
            $data = $user;
        }
        
        try {
            $NotificationData = Client::setEndpoint('users/notification')
                          ->setHeaders([
                              'Authorization' => $data['token'],
                              'pn' => $data['pn'],
                              'branch_id' => $data['branch']
                          ])->get();
            return $Arrnotification = $NotificationData['contents'];
            
            session()->put('notifications', $Arrnotification);

        } catch (ClientException $e) {
            \Log::info(Psr7\str($e->getRequest()));
            if ($e->hasResponse()) {
                \Log::info(Psr7\str($e->getResponse()));
            }
        }
    }
}

if (! function_exists('notificationsUnread')) {
    /**
     * Get logged user info.
     *
     * @param  integer $value
     * @return mixed
     */
    function notificationsUnread()
    {
        $users = session()->get('user');
        foreach ($users as $user) {
            $data = $user;
        }
        // var_dump(substr($data['branch'],-3) );
        try {
            $NotificationDataUnread = Client::setEndpoint('users/notification/unread')
                          ->setHeaders([
                              'Authorization' => $data['token'],
                              'pn' => $data['pn'],
                              'branch_id' => $data['branch'],
                              'role' => $data['role'],
                          ])->get();

            return $ArrnotificationUnread = $NotificationDataUnread['contents'];
            
            session()->put('notificationsUnread', $ArrnotificationUnread);
            
        } catch (ClientException $e) {
            \Log::info(Psr7\str($e->getRequest()));
            if ($e->hasResponse()) {
                \Log::info(Psr7\str($e->getResponse()));
            }
        }
    }
}

if (! function_exists('get_religion')) {

    /**
     * Convert csv file to array.
     *
     * @param  string $file path to file
     * @param  array $headers
     * @param  string $delimiter
     *
     * @return array
     */
    function get_religion($key)
    {
        $data = array(
            "BUD" => "BUDHA"
            , "HIN" => "HINDU"
            , "ISL" => "ISLAM"
            , "KRI" => "KRISTEN"
            , "ZZZ" => "LAINNYA"
        );

        if ( $key != 'all' ) {
            return isset($data[$key]) ? $data[$key] : '-';
        }

        return $data;
    }
}

if (! function_exists('get_title')) {

    /**
     * Convert csv file to array.
     *
     * @param  string $file path to file
     * @param  array $headers
     * @param  string $delimiter
     *
     * @return array
     */
    function get_title($key)
    {
        $data = array(
            "1" => "SDTT"
            , "2" => "SD"
            , "3" => "SMP"
            , "4" => "SMA"
            , "5" => "Diploma 1"
            , "6" => "Diploma 2"
            , "7" => "Diploma 3"
            , "8" => "S-1"
            , "9" => "S-2"
            , "10" => "S-3"
        );

        if ( $key != 'all' ) {
            return isset($data[$key]) ? $data[$key] : '-';
        }

        return $data;
    }
}

if (! function_exists('get_employment')) {

    /**
     * Convert csv file to array.
     *
     * @param  string $file path to file
     * @param  array $headers
     * @param  string $delimiter
     *
     * @return array
     */
    function get_employment($key)
    {
        $data = array(
            "1" => "Pegawai Tetap"
            , "2" => "Kontrak"
            , "3" => "Honorer"
            , "4" => "Lainnya"
        );

        if ( $key != 'all' ) {
            return isset($data[$key]) ? $data[$key] : '-';
        }

        return $data;
    }
}

if (! function_exists('get_loan_history')) {

    /**
     * Convert csv file to array.
     *
     * @param  string $file path to file
     * @param  array $headers
     * @param  string $delimiter
     *
     * @return array
     */
    function get_loan_history($key)
    {
        $data = array(
            "1" => "Pernah menunggak"
            , "2" => "Debitur baru"
            , "3" => "Tidak ada tunggakan"
        );

        if ( $key != 'all' ) {
            return isset($data[$key]) ? $data[$key] : '-';
        }

        return $data;
    }
}