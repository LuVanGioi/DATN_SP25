<?php

if (!function_exists('xoadau')) {
    function xoadau($strTitle)
    {
        $strTitle = strtolower($strTitle);
        $strTitle = trim($strTitle);
        $strTitle = str_replace(' ', '-', $strTitle);
        $strTitle = preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strTitle);
        $strTitle = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $strTitle);
        $strTitle = str_replace('đ', 'd', $strTitle);
        $strTitle = str_replace('Đ', 'd', $strTitle);
        $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
        return $strTitle;
    }
}

if (!function_exists('xoadau1')) {
    function xoadau1($strTitle)
    {
        $strTitle = strtolower($strTitle);
        $strTitle = trim($strTitle);
        $strTitle = str_replace(' ', '', $strTitle);
        $strTitle = preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strTitle);
        $strTitle = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $strTitle);
        $strTitle = str_replace('đ', 'd', $strTitle);
        $strTitle = str_replace('Đ', 'd', $strTitle);
        $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
        return $strTitle;
    }
}

if (!function_exists('TrangThaiThanhToan')) {
    function TrangThaiThanhToan($tttt) {
        if ($tttt == "chuathanhtoan") {
            return "Chưa Thanh Toán";
        }

        if ($tttt == "dathanhtoan") {
            return "Đã Thanh Toán";
        }


        if ($tttt == "huythanhtoan") {
            return "Hủy Thanh Toán";
        }

    }
}

if (!function_exists('nhan')) {
    function nhan($nhan)
    {
        if ($nhan == "hot") {
            return "HOT";
        } else if ($nhan == "sale") {
            return "Giảm Giá";
        } else if ($nhan == "new") {
            return "Sản Phẩm Mới";
        } else if ($nhan == "featured") {
            return "Nổi Bật";
        } else if ($nhan == "clearance") {
            return "Xả Kho";
        } else if ($nhan == "limited") {
            return "Bản Giới Hạn";
        } else if ($nhan == "discount") {
            return "Ưu Đãi Đặc Biệt";
        } else {
            return "";
        }
    }
}

if (!function_exists('trangthai')) {
    function trangThaiDonHang($trangthai)
    {
        if ($trangthai == 'choxacnhan')
            return '<span class="badge bg-warning">Chờ Xác Nhận</span>';
        else if ($trangthai == 'daxacnhan')
            return '<span class="badge bg-dark">Đã Xác Nhận</span>';
        else if ($trangthai == 'danggiao')
            return '<span class="badge bg-primary">Đang Giao</span>';
        else if ($trangthai == 'huydon')
            return '<span class="badge bg-danger">Hủy Đơn</span>';
        else if ($trangthai == 'dagiao')
            return '<span class="badge bg-success">Đã Giao</span>';
        else if ($trangthai == 'thatbai')
            return '<span class="badge bg-danger">Thất Bại</span>';
        else if ($trangthai == 'chuathanhtoan')
            return '<span class="badge bg-warning">Chưa Thanh Toán</span>';
        else if ($trangthai == 'dathanhtoan')
            return '<span class="badge bg-success">Đã Thanh Toán</span>';
        else if ($trangthai == 'huythanhtoan')
            return '<span class="badge bg-danger">Hủy Thanh Toán</span>';
        else if ($trangthai == 'hoanhang')
            return '<span class="badge bg-danger">Hoàn Hàng</span>';
        else if ($trangthai == 'danhan')
            return '<span class="badge bg-success">Hoàn Thành</span>';
        else {
            return '<span class="badge bg-info">Khác</span>';
        }
    }
}

if (!function_exists('soGon')) {
    function soGon($number)
    {
        if ($number >= 1000000000) {
            return round($number / 1000000000, 1) . "B";
        } elseif ($number >= 1000000) {
            return round($number / 1000000, 1) . "M";
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . "K";
        }
        return $number;
    }
}
