<footer class="bg-second">
    <div class="container">
        <div class="row">
            <div class="col-5 col-md-6 ">
                <h3 class="footer-head">Đồ Án Chuyên Ngành CNTT</h3>
                <ul class="menu">
                    <li><a href="#">Sinh viên thực hiện: Nguyễn Đức Huy</a></li>
                    <li><a href="#">Lớp: DH20CS02</a></li>
                    <li><a href="#">MSV: 2051010105</a></li>
                </ul>
            </div>

            <div class="col-5 col-md-6">
                <h3 class="footer-head">Đại học Mở TP.Hồ Chí Minh</h3>
                <ul class="menu">
                    <li><a href="#"> Điện thoại: 0938204537</a></li>
                    <li><a href="#">Email: 2051010105huy@ou.edu.vn</a></li>
                    <li><a href="#">Địa chỉ: Hồ Chí Minh</a></li>
                </ul>
            </div>
            <div class="col-2 col-md-6 col-sm-12">
                <div class="contact">
                    <h3 style="font-size: 1.9rem" class="contact-header">
                        BIKER STORE
                    </h3>
                    <ul style="padding:0" class="contact-socials">
                        <li><a href="#">
                                <i class='bx bxl-facebook-circle'></i>
                            </a></li>
                        <li><a href="#">
                                <i class='bx bxl-instagram-alt'></i>
                            </a></li>
                        <li><a href="#">
                                <i class='bx bxl-youtube'></i>
                            </a></li>
                        <li><a href="#">
                                <i class='bx bxl-twitter'></i>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- app js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    <?php if (isset($_SESSION['message'])) {
    ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?= $_SESSION['message'] ?>');
    <?php
        unset($_SESSION['message']);
    }
    ?>
</script>