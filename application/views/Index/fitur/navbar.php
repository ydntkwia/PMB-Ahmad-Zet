<nav class="navbar navbar-expand-lg navbar-dark fixed-top ts-separate-bg-element " id="penanda" data-bg-color="#1a1360">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>">
      <img src="<?php echo base_url()?>/assets/image/logo-w2.png" class="h-35-px" alt="" style="width: 130px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="pertama nav-item nav-link active ts-scroll navigasi kontener jarak" href="#page-top" onclick="pindah('<?php echo base_url()?>')">&nbsp;<span class="nbsp-mbl">&nbsp;</span>Home </a>
        <a class="kedua nav-item nav-link ts-scroll navigasi kontener" href="#how-it-works" onclick="pindah('<?php echo base_url()?>info-pendaftaran')">&nbsp;<span class="nbsp-mbl">&nbsp;</span>Info Pendaftaran</a>
        <a class="ketiga nav-item nav-link ts-scroll navigasi kontener" href="#what-is-appstorm" onclick="pindah('<?php echo base_url()?>daftar')">&nbsp;<span class="nbsp-mbl">&nbsp;</span>Daftar</a>
        <a class="keempat nav-item nav-link ts-scroll navigasi kontener" href="#Berita" onclick="pindah('<?php echo base_url()?>berita')">&nbsp;<span class="nbsp-mbl">&nbsp;</span>Berita</a>
        <a class="kelima nav-item nav-link ts-scroll navigasi kontener" href="#Berita" onclick="pindah('<?php echo base_url()?>bantuan')">&nbsp;<span class="nbsp-mbl">&nbsp;</span>Bantuan</a>

        <?php 
        $base_url = "http://".$_SERVER['HTTP_HOST'];
        $base_url .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME']));
        
        if ($this->session->userdata('nama') != '' ){
          if ($this->session->userdata('level') != '4'){
            $str = $this->session->userdata('nama');
            if (strlen($str) > 10)
            {
              $str = substr($str, 0, 10);
              $str = explode(' ', $str);
              array_pop($str);
              $str = implode(' ', $str);
            }
            ?>
            <a href='<?php echo base_url() ?>admin'><div class='w-30-px h-30-px ml-10-px pp' data-bg-image='<?php echo base_url() ?>assets/img/admin/<?php echo $this->session->userdata('foto'); ?>'></div></a>
            <a href='<?php echo base_url() ?>admin'><span class='nav-item nav-link ts-scroll navigasi kontener tombol-user f-center'>
              <?php echo $str ?>
            </span></a>
            <?php
          }
          else{
            $str = $this->session->userdata('nama');
            if (strlen($str) > 15)
            {
              $str = substr($str, 0, 20);
              $str = explode(' ', $str);
              array_pop($str);
              $str = implode(' ', $str);
            }
            ?>
            <a href='<?php echo base_url() ?>user'><div class='w-30-px h-30-px ml-10-px pp' data-bg-image='<?php echo base_url() ?>assets/img/user/<?php echo $this->session->userdata('foto'); ?>'></div></a>
            <?php
            echo "<a href='$base_url/user'>"."<span class='nav-item nav-link ts-scroll navigasi kontener tombol-user fw-6 f-center'>";
            echo $str;
            echo "</span></a>";
          }
        }else{
          echo "<a class='jarak navigasi nav-item nav-link ts-scroll btn btn-warning btn-sm text-white ml-3 px-3 ts-width__auto' href='$base_url/login'><i class='fa fa-user'></i>&nbsp;&nbsp;Login</a>";
        }  
        ?>
      </div>
    </div>
  </div>
</nav>
<div class="ts-page-wrapper" id="page-top">



