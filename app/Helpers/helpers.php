<?php

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