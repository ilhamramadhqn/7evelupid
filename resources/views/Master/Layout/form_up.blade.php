<?php  
$label = Request::segment(2) =='create' ? 'Tambah Data' :'Edit Data'; 
?>
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h5>{{$label}}</h5>