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

if (! function_exists('getUser')) {

    /**
     * GET UserLogin Data.
     *
     * @return object
     */
    function getUser(){
        /*  */
        $users = session()->get('user');

        foreach ($users as $user) {
            $data = $user;
        }

        return $data;
    }
}

if (! function_exists('is_read')) {

    /**
     * GET UserLogin Data.
     *
     * @return object
     */
    function is_read(){
        $data = session()->get('user');

        return json_encode( ['pn' => $data['pn'] ,'branch_id'=> $data['branch_id'] ,'role'=> $data['role'] ,'name'=> $data['name']] );
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
    function checkRolesInternal($hilfm ,$posisi)
    {
        if( in_array( intval($hilfm), [ 37, 38, 39, 41, 42, 43 ] ) ) {
            $ArrRole = ['role' =>'ao','branch_id' => $hilfm ];
        } else if( in_array( intval($hilfm), [ 21, 49, 50, 51 ] ) ) {
            $ArrRole = ['role' =>'mp','branch_id' => $hilfm ];
        } else if( in_array( intval($hilfm), [ 5, 11, 12, 14, 19 ] ) ) {
            $ArrRole = ['role' =>'pinca','branch_id' => $hilfm ];
        } else if( in_array( intval($hilfm), [ 59 ] ) ) {
            $ArrRole = ['role' =>'prescreening','branch_id' => $hilfm ];
            if( in_array( strtolower($posisi), [ 'collateral appraisal', 'collateral manager' ] ) ){
                $role = str_replace(' ', '-', strtolower($posisi));
            }
        } else if( in_array( intval($hilfm), [26] ) ) {
            $ArrRole = ['role' =>'staff','branch_id' => $hilfm ];
        } else if( in_array( intval($hilfm), [18] ) ) {
            $ArrRole = ['role' =>'collateral','branch_id' => $hilfm ];
        } else {
            $ArrRole = ['role' =>'null','branch_id' => $hilfm ];
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
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'branch_id' => $data['branch']
                    // , 'auditaction' => 'action name'
                    // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->get();
            session()->put('notifications', $NotificationData['contents']);
            return $Arrnotification = $NotificationData['contents'];


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
        try {
            $NotificationDataUnread = Client::setEndpoint('users/notification/unread')
                ->setHeaders([
                    'Authorization' => $data['token']
                    , 'pn' => $data['pn']
                    , 'branch_id' => $data['branch']
                    , 'role' => $data['role']
                    // , 'auditaction' => 'action name'
                    // , 'long' => number_format($request->get('long', env('DEF_LONG', '106.81350')), 5)
                    // , 'lat' => number_format($request->get('lat', env('DEF_LAT', '-6.21670')), 5)
                ])->get();
            session()->put('notificationsUnread', $NotificationDataUnread['contents']);
            return $ArrnotificationUnread = $NotificationDataUnread['contents'];


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
            "S1" => "Sarjana"
            , "S2" => "Master"
            , "S3" => "Doktor"
            // , "SE" => "Sekolah"
            , "SD" => "SD"
            , "SM" => "SMP"
            , "SU" => "SMU/SMK"
            , "ZZ" => "Diploma"
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

if (! function_exists('get_visit_purpose')) {

    /**
     * Convert csv file to array.
     *
     * @param  string $file path to file
     * @param  array $headers
     * @param  string $delimiter
     *
     * @return array
     */
    function get_visit_purpose($key)
    {
        $data = array(
            "prakarsa" => "Prakarsa Kredit"
            , "negosiasi" => "Negosiasi"
            , "pembinaan" => "Pembinaan"
            , "penagihan" => "Penagihan"
            , "lain" => "Lain-lain"
        );

        if ( $key != 'all' ) {
            return isset($data[$key]) ? $data[$key] : '-';
        }

        return $data;
    }
}

if (! function_exists('get_bank')) {

    /**
     * Convert csv file to array.
     *
     * @param  string $file path to file
     * @param  array $headers
     * @param  string $delimiter
     *
     * @return array
     */
    function get_bank($key)
    {
        $data = array(
            "bri" => "BRI"
            , "bni" => "BNI"
            , "mandiri" => "Mandiri"
            , "bca" => "BCA"
            , "btn" => "BTN"
            , "panin" => "Panin"
            , "permata" => "Permata"
            , "bii" => "BII"
            , "danamon" => "Danamon"
            , "cimb" => "CIMB"
            , "other" => "Lainya"
        );

        if ( $key != 'all' ) {
            return isset($data[$key]) ? $data[$key] : '-';
        }

        return $data;
    }
}