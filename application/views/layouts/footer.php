<section class="footer">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-left ps-3">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-right pe-3">
                    <p>Copyright ©Talkverse 2022</p>
                </div>
            </div>
        </div>
    </div>
</section>
 <script>
$(".toggle-password").click(function () {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});


</script>
</body>
 </html>
	