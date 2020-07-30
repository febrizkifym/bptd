window.onscroll = function() {myFunction()};
var header = document.getElementById("navigation");
var sticky = header.offsetTop;
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("bg-dark");
  } else {
    header.classList.remove("bg-dark");
  }
}
$(document).ready(function () {
    $(window).bind('scroll', function () {
        var triggerClass = 28;
        var scrollTop = $(document).scrollTop();
        var navbar = $('nav');
        var brand = $('.navbar-brand');
        if (scrollTop > triggerClass) {
            navbar.addClass('bg-scroll');
            $('.nav-item').addClass('scroll');
        } else {
            navbar.removeClass('bg-scroll');
            $('.nav-item').removeClass('scroll');
        }
    });
});

//form registrasi
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    //
    var jenis_usia = $('#usia').val();
    var kelas = $('#kelas').val();
    var id_kapal = $('#tujuan').val();
    var golongan = $('#golongan').val();
    var data_url = 'bulotu/get_tarif?id_kapal='+id_kapal+'&jenis_usia='+jenis_usia+'&kelas='+kelas;
    var url_kenderaan = 'bulotu/get_tarif_kenderaan?id_kapal='+id_kapal+'&golongan='+golongan;
    var kenderaan = false;

    $("#uid").val(Math.floor(100000 + Math.random() * 900000));
    // $("#uid").val(Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15));
    function cek_harga(){
        if(kenderaan == true){
            $.ajax({
                type: 'POST',
                url: url_kenderaan,
                data: '_token = <?php echo csrf_token() ?>',
                success:function(data){
                    $("#total_harga").val(numeral(data.harga).format('0,0'));
                }
            });
        }else{
            $.ajax({
                type: 'POST',
                url: data_url,
                data: '_token = <?php echo csrf_token() ?>',
                success:function(data){
                    $("#total_harga").val(numeral(data.harga).format('0,0'));
                }
            });
        }
    }
    cek_harga();
    $(".parameter").change(function(){
        jenis_usia = $('#usia').val();
        kelas = $('#kelas').val();
        id_kapal = $('#tujuan').val();
        golongan = $('#golongan').val();
        data_url = 'bulotu/get_tarif?id_kapal='+id_kapal+'&jenis_usia='+jenis_usia+'&kelas='+kelas;
        url_kenderaan = 'bulotu/get_tarif_kenderaan?id_kapal='+id_kapal+'&golongan='+golongan;
        cek_harga();
    });
    $("#kenderaan_y").click(function(){
        kenderaan = true;
        $("#form-golongan").show(300);
        $("#kelas").prop("disabled",true);
        $("#usia").prop("disabled",true);
        $("#golongan").prop("disabled",false);
        cek_harga();
    });
    $("#kenderaan_n").click(function(){
        kenderaan = false;
        $("#form-golongan").hide(300);
        $("#kelas").prop("disabled",false);
        $("#usia").prop("disabled",false);
        $("#golongan").prop("disabled",true);
        cek_harga();
    });

    //cek regis
    $("#tiket_result").hide();
    $("#tiket_notfound").hide();
    $("#cek_btn").click(function(){
        var no_regis = $("#no_regis").val();
        var url_tiket = 'bulotu/get_tiket?id='+no_regis;
        $.ajax({
            type: 'POST',
            url: url_tiket,
            data: '_token = <?php echo csrf_token() ?>',
            success:function(data){
                console.log(data);
                if(data.status == '200'){
                    $(".t_nama").html(data.nama);
                    $(".t_noktp").html(data.no_ktp);
                    $(".t_nohp").html(data.no_hp);
                    $(".t_jk").html(data.jenis_kelamin);
                    $(".t_agama").html(data.agama);
                    $(".t_seat").html(data.seat);
                    $(".t_status").html(data.status_tiket);
                    if(data.usia == 1){
                        $(".t_usia").html("Dewasa (Lebih dari 12 Tahun)");
                    }else{
                        $(".t_usia").html("Anak-Anak (Kurang dari 12 Tahun)");

                    }
                    $(".t_kapal").html(data.kapal);
                    $(".t_kelas").html(data.kelas);
                    $(".t_tarif").html("Rp. "+data.harga);

                    $("#tiket_result").show(300);
                    $("#tiket_notfound").hide(300);
                }else if(data.status == '404'){
                    $("#tiket_notfound").show(300);
                    $("#tiket_result").hide(300);
                };
            }
        });
    });
});