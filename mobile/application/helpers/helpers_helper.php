<?php

function ceklogin()
{
	$ci = &get_instance();
	$ceksession = $ci->session->userdata('level');

	if ($ceksession == '') {
		redirect('auth/login');
	}
}

function afterlogin()
{
	$ci = &get_instance();
	$ceksession = $ci->session->userdata('level');

	if ($ceksession != '') {

		redirect('auth/login');
	}
}

function DateToIndo($date2)
{
	$BulanIndo2 = array(
		"Januari", "Februari", "Maret",
		"April", "Mei", "Juni",
		"Juli", "Agustus", "September",
		"Oktober", "November", "Desember"
	);

	$tahun2 = substr($date2, 0, 4);
	$bulan2 = substr($date2, 5, 2);
	$tgl2   = substr($date2, 8, 2);

	$result = $tgl2 . " " . $BulanIndo2[(int)$bulan2 - 1] . " " . $tahun2;
	return ($result);
}

function FormatUang($nilai)
{

	return number_format($nilai, '0', '', '.');
}
