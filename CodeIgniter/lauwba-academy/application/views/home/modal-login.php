<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-login">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email anda</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="email" class="form-control" required name="email" placeholder="masukkan email anda">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password anda</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" required name="passwords" placeholder="masukkan password anda">
                            <div class="input-group-append">
                                <span class="input-group-text btn"><i class="fa fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".form-login").submit(function(e){
       e.preventDefault();
       let data = $(this).serialize();
       let url = "<?php echo site_url('welcome/proc_login')?>";
//       .post( url, data, success(data, textStatus, jqXHR), dataType )
       $.post(url, data, function(data, textstatus, jqXHR){
           let response = data.message;
           console.log(data);
           alert(response);
       }, 'JSON');
    });
</script>