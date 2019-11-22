<?php

namespace App\Http\Controllers;
use Endroid\QrCode\QrCode;
use Intervention\Image\ImageManagerStatic as Image;

class QrController extends Controller {

	function make() {

		$id = '3';

		$path = null;
		$public = rtrim(app()->basePath('public/qrfile' . $path), '/');

		$qrcode = new QrCode($id);

		header("Content-Type: image/png");
		$qrcode->writeString();
		$qrcode->writeFile($public . '/' . $id . '.png');

	}

	function view($id) {

		$path = null;
		$public = rtrim(app()->basePath('public/qrfile' . $path), '/');
		$storagepath = $public . '/' . $id . '.png';
		return Image::make($storagepath)->response();
	}

}
